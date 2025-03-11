<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailRegisterVerify;
use App\Mail\MailResetPassword;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    /**
     * Admin Authentication
     */
    public function adminLoginForm()
    {
        $data = [
            'pageTitle' => 'Admin Login',
        ];
        return view('back.pages.auth.admin.login', $data);
    }

    public function adminForgotPasswordForm()
    {
        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'Shop',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        return view('back.pages.auth.admin.forgot-password', $data);
    }

    public function adminLoginHandle(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required',
            ], [
                'login_id.required' => 'Enter your email or your username.',
                'login_id.email' => 'Invalid email address.',
                'login_id.exists' => 'Email or username does not exist.',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required',
            ], [
                'login_id.required' => 'Enter your email or your username.',
                'login_id.exists' => 'Email or username does not exist.',
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );

        if (Auth::guard('admin')->attempt($creds)) {
            // Check Admin user was blocked
            if (Auth::guard('admin')->user()->blocked) {
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.admin.login')->with('fail', 'Your account has been blocked.');
            }

            // Redirect admin to route order-manage
            return redirect()->route('admin.order.manage');
        } else {
            return redirect()->back()->with('fail', 'Invalid credentials.');
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.admin.login')->with('success', 'You have been logged out.');
    }

    /**
     * User Authentication
     */
    public function userRegisterForm()
    {
        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $cartItems = [];
        $dataCart = null;
        $data = [
            'pageTitle' => 'User Login',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        return view('front.user.register', $data);
    }
    public function userRegisterFormPost(Request $request)
    {
        //// validate form
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'username' => 'bail|required|unique:users,username|max:255',
            'gender' => 'integer',
            'email' => 'bail|required|string|email|max:255|unique:users,email',
            'termAgreement' => 'bail|accepted',
            'password' => [
                'required',
                Password::min(8)->letters()->mixedCase()->numbers(),
                'confirmed',
                'max:100',
            ],
            'dob' => 'bail|required|date|before:today',
            'phone' => 'bail|required|string|min:10|max:16|unique:users,phone',
            'address' => "string|max:255",
        ]);
        // dd('toi day r');

        //// if no address is provided
        if ($request->address == null) {
            $request['address'] = '';
        }
        $request['password'] = bcrypt($request['password']);
        $token_email = str::random(32);
        $request->merge(['token_login' => $token_email]); // add 'token_login' to request

        // $cookieCart = unserialize(Cookie::get('cart'));
        // if (!$cookieCart) {
        //     // dd('ko co cart');
        // } else {
        //     // dd($cookieCart);
        // }

        $newItemsList = [];
        if ($request['saveCart']) {
            $newItemsList = unserialize(Cookie::get('cart'));
            Cookie::queue(Cookie::forget('cart'));
        }
        $newUserId = User::create($request->all())->id;
        Cart::create([
            'userId' => $newUserId,
            'itemsList' => $newItemsList,
        ]);

        //// send email verify
        $details = [
            'title' => 'FruitKha Account verification',
            'name' => $request['name'],
            'email' => $request['email'],
            'verificationLink' =>  $token_email,
            'token_email' => $token_email,
        ];
        Mail::to($request['email'])->send(new MailRegisterVerify($details));
        //// end send email verify


        return redirect()->route('user.user.login')->with('success', 'You have successfully registered, please check your email for further instructions');
    }

    public function userVerifyEmail($email, $token_email)
    {
        // dd($email, $token_email);
        //// get user with email and token provided
        $user = User::where('email', $email)->where('token_login', $token_email)->first();

        //// if user's email exists and token is valid
        if ($user) {
            $user->blocked = false;
            $user->email_verified_at = now();
            $user->token_login = null;
            $user->save();
            return redirect()->route('user.user.login')->with('success', 'Your account has been verified. You can now login.');
        } else {
            return redirect()->route('user.user.login')->with('fail', 'Verification failed. Please try again.');
        }
    }
    public function userMailConfirm(Request $lala)
    {
        return view('front.user.mailConfirm', compact($lala));
    }
    public function userMailConfirmPost(Request $request)
    {
        //
    }

    public function userLoginForm()
    {
        // dd('toi day');

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $cartItems = [];
        $dataCart = null;
        $data = [
            'pageTitle' => 'User Login',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'cart' => $dataCart,

        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        //// autologin if user chose remember me on this device
        if (Cookie::get('token_login') != null && Cookie::get('token_rememberMe') != null) {
            $rememberMe = Cookie::get('token_rememberMe');
            $tokenLogin = Cookie::get('token_login');
            $idLogin = User::where('token_login', $tokenLogin)->first()->id;
            $idRememberMe = User::where('token_rememberMe', $rememberMe)->first()->id;
            // dd('toi day roi');
            if ($idLogin == $idRememberMe) {
                // dd('dung roi');
                if (auth('web')->loginUsingId($idLogin)) {
                    $user = User::find(Auth::id());
                    $token_login = str::random(32);
                    $user->token_login = $token_login;
                    $user->save();
                    Session::put('user', Auth::user());
                    Cookie::queue('token_login', $token_login);
                    return redirect()->route('user.shop', ['pageTitle' => "SHOP"]);
                }
            }
        }
        //// End autologin

        //// return to normal login page
        return view('back.pages.auth.user.login', $data);
    }
    public function userLoginHandle(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email',
                'password' => 'required|min:5',
            ], [
                'login_id.required' => 'Enter your email or your username.',
                'login_id.email' => 'Invalid email address.',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required',
                'password' => 'required',
            ], [
                'login_id.required' => 'Enter your email or your username.',
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );

        if (Auth::guard('web')->attempt($creds)) {
            //// Check user user was blocked
            if (Auth::guard('web')->user()->blocked) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('user.user.login')->with('fail', 'Your account has been blocked.');
            }
            //// Check user email was verified
            if (Auth::guard('web')->user()->email_verified_at == null) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('user.user.login')->with('fail', 'your account has not been verified. please accept the invitation and then try again.');
            }

            //// get user then save token tolen_login to both BD and Cookie
            $user = User::find(Auth::id());
            $token_login = str::random(32);
            $user->token_login = $token_login;
            //// generate token_rememberMe save to both DB and Cookie if user chose to remember me on this device
            if (isset($request->rememberMe)) {
                $token_rememberMe = Str::random(100);
                $user->token_rememberMe = $token_rememberMe;
                Cookie::queue('token_rememberMe', $token_rememberMe, 43200);
            }
            $user->save();

            //// save token_login to Cookie
            Cookie::queue('token_login', $token_login, 43200);

            //// put $user to Session
            Session::put('user', $user);


            //// Redirect user to route shop if logged successfully
            return redirect()->route('user.shop')->with('success', 'You have successfully logged in.');
        } else {
            //// redirect fail credentials
            return redirect()->back()->with('fail', 'Invalid credentials.');
        }
    }

    public function userLogout()
    {
        // if (Session::get("sessionExpired")) {
        // }
        // dd($data -> all());

        ////Get user from session
        $user = User::find(Auth::id());
        // dd($user);

        //// clear token_login and token_remember me from DB
        if ($user) {
            $user->token_login = null;
            $user->token_rememberMe = null;
            $user->save();
        }
        // dd(Session::get('sessionExpired'));

        //// Logout from Laravel session and clear user from Session
        Auth::guard('web')->logout();
        Session::forget('user');

        //// clear token_login and token_remember me from Cookie
        Cookie::queue(Cookie::forget('token_login'));
        Cookie::queue(Cookie::forget('token_rememberMe'));
        if (Session::has('sessionExpired')) {
            return redirect()->route('user.user.login')->with('fail', Session::get('sessionExpired'));
        }
        return redirect()->route('user.shop')->with('fail', 'You have logged out.');
    }
    public function userForgotPasswordForm()
    {
        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'Shop',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        return view('front.user.forgotPassword', $data);
    }
    public function userForgotPasswordHandle(Request $request)
    {
        // dd('toi day r');

        //// validate forgot password form
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Invalid email address.',
        ]);

        //// get user with email preg_filter
        $user = User::where('email', $request->email)->first();


        //// redirect back if found no user match info
        if (!$user) {
            return redirect()->back()->with('fail', 'No account found with this email address.');
        }

        //// generate token_password and token_login save to DB, token_login save to cookie
        $token_login = Str::random(32);
        $token_password = Str::random(32);
        $user->token_password = $token_password;
        $user->token_login = $token_login;
        Cookie::queue('token_login', $token_login, 60 * 24 * 30);
        $user->save();

        //// send email to user with link to reset password
        $details = [
            'title' => 'FruitKha Reset Password',
            'name' => $user->name,
            'email' => $user->email,
            'token_password' => $token_password,
            'token_login' => $token_login,
        ];
        Mail::to($user->email)->send(new MailResetPassword($details));

        return redirect()->route('user.user.forgotPassword')->with('success', 'Reset password link has been sent to your email address.');
    }
    public function userResetPasswordForm($email, $token_login, $token_password)
    {
        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'Shop',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        //// get user with infors provided, ensure token_login
        $user = User::where('email', $email)->where('token_login', $token_login)->where('token_password', $token_password)->first();
        if (!$user) {
            return redirect()->route('user.user.forgotPassword')->with('fail', 'Reset password link is invalid or expired.');
        }

        //// pass email, token_login, token_password to view resetPassword
        $data['email'] = $email;
        $data['token_login'] = $token_login;
        $data['token_password'] = $token_password;

        return view('front.user.resetPassword', $data);
    }
    public function userResetPasswordHandle(Request $request)
    {
        // dd('toi day');

        //// validate reset password form
        //// password minlength=8, contain at lest 1 lower, 1 upper, 1 number
        $request->validate([
            'password' => [
                'required',
                Password::min(8)->letters()->mixedCase()->numbers(),
                'confirmed',
                'max:255',
            ],
        ], [
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        //// get user with infors provided, ensure token_login
        $user = User::where('email', $request->email)->where('token_login', $request->token_login)->where('token_password', $request->token_password)->first();
        if (!$user) {
            return redirect()->route('user.user.forgotPassword')->with('fail', 'Reset password link is invalid or expired.');
        }

        //// update password in DB and clear token_login and token_password
        $user->password = bcrypt($request->password);
        $user->token_login = null;
        $user->token_password = null;
        $user->save();
        //// clear token_login from Cookie
        Cookie::queue(Cookie::forget('token_login'));

        return redirect()->route('user.user.login')->with('success', 'Your password has been successfully reset.');
    }
}
