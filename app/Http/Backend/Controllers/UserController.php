<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //
    // public function userDasboard()
    // {
    //     $data = [
    //         'pageTitle' => 'User Dasboard',
    //     ];
    //     return view('back.pages.dasboard.user.dashboard', $data);
    // }

    public function index()
    {
        //// get all users from DB
        $data = [
            'pageTitle' => 'User Index',
            'users' => User::all(),
        ];
        return view('back.pages.user.index', $data);
    }
    public function changeBlocked(User $user)
    {
        $user = User::find($user->id);
        $id = $user->id;
        if ($user == null) {
            return redirect()->back()->with('fail', 'found no user with id ' . $id);
        }
        $user->blocked = !$user->blocked;

        // clear token_login and token_rememberMe to force user logout
        $user->token_login = null;
        $user->token_rememberMe = null;

        $user->save();

        return back();
    }
    public function create()
    {
        return view('front.user.register');
    }

    public function profile()
    {
        //// force user logout
        // if (Cookie::get('token_login') && Session::has('user')) {
        //     if (Cookie::get('token_login') != Auth::user()->token_login) {
        //         Session::forget('user');
        //         Cookie::queue(Cookie::forget('token_login'));
        //         return redirect()->route('user.user.logout')->with('fail', 'Your login session has expired, please log in again.');
        //     }
        // }
        if ((Session::has('user'))) {
            if (Cookie::get('token_login') != Auth::user()->token_login) {
                Session::forget('user');
                Cookie::queue(Cookie::forget('token_login'));
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
            if (!Cookie::has('token_login')) {
                Session::forget('user');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
        }
        //// End force user logout

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = User::find(Auth::id());
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'User Profile',
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

        return view('front.user.profile', $data);
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'gender' => 'integer',
            'dob' => 'required|date|before:today',
            'address' => 'string|nullable|max:255',
            'phone' => [
                'required',
                'string',
                'min:10',
                'max:16',
                Rule::unique('users', 'phone')->ignore($user->id),
            ]
        ]);
        if ($request->address == null) {
            $request['address'] = '';
        }
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.user.profile')->with('success', 'Profile updated successfully');
    }

    public function profileUpdatePassword()
    {
        //// force user logout
        if ((Session::has('user'))) {
            if (Cookie::get('token_login') !== Auth::user()->token_login) {
                Session::forget('user');
                Cookie::queue(Cookie::forget('token_login'));
                // Session::flash('sessionExpired', 'Your login session has expired, please log in again.');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
            if (!Cookie::has('token_login')) {
                Session::forget('user');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
        }
        //// End force user logout

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

        if (!$user) {
            return redirect()->route('user.user.profile')->with('fail', 'User not found');
        }
        return view('front.user.updatePassword', $data);
    }
    public function profileUpdatePasswordPost(Request $request)
    {
        // dd($request->all());
        // dd('toi day roi change password');
        // $user = Auth::user();
        $user = User::find($request->userId);
        if (!$user) {
            return redirect()->route('user.user.profile')->with('fail', 'User not found');
        }
        $oldPassword = $request->oldPassword;
        if ($request->oldPassword == '') {
            Session::flash('oldPassword', 'Please enter your current password');
            return redirect()->back();
        }
        $comparePW = Hash::check($oldPassword, $user->password);
        if (!$comparePW) {
            Session::flash('oldPassword', 'Your current password is incorrect');
            return redirect()->back();
        }
        $request->validate(
            [
                // 'oldPassword' => "required|string|max:100",
                'oldPassword' => [
                    'required',
                    'max:100',
                ],
                'newPassword' => [
                    'bail',
                    'required',
                    Password::min(8)->letters()->mixedCase()->numbers(),
                    'confirmed',
                    'max:100',
                ]
            ],
            [
                // 'newPassword' => 'error',
            ]
        );

        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect()->route('user.user.profile')->with('success', 'Password updated successfully');
        // dd($comparePW);
        // dd($oldPassword == $user->password);
    }
    public function forgotPassword()
    {
        return view('front.user.forgotPassword');
    }
}
