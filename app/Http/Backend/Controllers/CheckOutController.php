<?php

namespace App\http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        //// force user logout
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

        //// get all available discounts
        $discounts = Discount::where('status', 1)->whereTodayOrBefore('starts_at')->whereTodayOrAfter('expires_at')->get();
        //// end get all available discounts

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        $discountAmount = 0;
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
            'pageTitle' => 'Checkout',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
            'discountAmount' => $discountAmount,
            'discounts' => $discounts
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        if ($data['cart'] == []) {
            return redirect()->route('user.user.cart.index')->with('fail', 'Your cart is empty, please add some products before checkout.');
        }
        return view('front.checkout.index', $data);
    }


    public function checkoutPost(Request $request)
    {
        //// get cart and cartItems
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
        if (Cookie::get('cart') && !Session::has('user')) {
            $cartItems =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $dataCart = unserialize(Cookie::get('cart'));
        };

        //// calculate all products in cart proCost
        $totalCost = 0;
        foreach ($cartItems as $item) {
            $totalCost += $item->proCost * $dataCart[$item->id];
        }
        // dd($dataCart);

        //// validate order and shipping form
        $request->validate([
            'orderName' => 'required|string|min:3|max:255',
            'orderPhone' => 'required|string|min:10|max:16',
            'orderAddress' => 'required|string',
            'shippingName' => 'required|string|min:3|max:255',
            'shippingPhone' => 'required|string|min:10|max:16',
            'shippingAddress' => 'required|string',
            'note' => 'max:10000',
        ]);

        //// get userId if user logged in, $userId = null if user not logged in
        $userId = null;
        if (Session::has('user')) {
            $userId = Auth::id();
        }

        //// add 'userId' and 'itemsList' to request
        $request->merge(['userId' => $userId]);
        $request->merge(['itemsList' => $dataCart]);

        //// save all request as data to Session
        $data = $request->all();
        Session::put('paymentData', $data);

        return redirect()->route('user.paymentIndex');
    }
    public function paymentIndex()
    {
        // dd('toi day r');

        //// force user logout
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

        //// if Session paymentData not exist, return back to page cart
        if (!Session::has('paymentData')) {
            return redirect()->route('user.user.cart.index')->with('fail', 'Please checkout first.');
        }

        //// get all data from Session paymenData
        $data = Session::get('paymentData');
        // dd($data);
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
        $data['pageTitle'] = 'Checkout';
        $data['categories'] = Category::all();
        $data['cartItems'] = $cartItems;
        $data['user'] = $user;
        $data['cart'] = $dataCart;
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };

        return view('front.checkout.payment', $data);
    }
}
