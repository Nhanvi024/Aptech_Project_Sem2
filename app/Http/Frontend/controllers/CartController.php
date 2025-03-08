<?php

namespace App\Http\Frontend\controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;


class CartController extends Controller
{
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

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = [];
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
        //// End innit header data

        //// check stock, remove from cart if stock zero
        $outofStockProduct = 0;
        if (Session::has('user')) {
            $cart = Cart::where('userId', Session::get('user')->id)->first();
            $listOld = $cart->itemsList;
            foreach ($dataCart as $key => $value) {
                $productCheck = Product::where('id', $key)->first();
                if ($productCheck->proStock < $value) {
                    // $outofStockProduct++;
                    if ($productCheck->proStock > 0) {
                        Arr::set($listOld, $key, $productCheck->proStock);
                    }
                    if ($productCheck->proStock == 0) {
                        Arr::forget($listOld, $key);
                        $outofStockProduct++;
                    }
                }
            }
            $cart->itemsList = $listOld;
            $cart->save();
        }
        if (Cookie::get('cart') && !Session::has('user')) {
            $listOld = unserialize(Cookie::get('cart'));
            foreach ($dataCart as $key => $value) {
                $productCheck = Product::where('id', $key)->first();
                if ($productCheck->proStock < $value) {
                    // dd('da lay duoc stock');
                    if ($productCheck->proStock > 0) {
                        Arr::set($listOld, $key, $productCheck->proStock);
                    } else {
                        Arr::forget($listOld, $key);
                        $outofStockProduct++;
                    }
                }
            }
            Cookie::queue('cart', serialize($listOld), 43200);
        }
        //// End check stock, remove from cart if stock zero

        //// get data again after change cart
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItemsNew = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCartNew = Cart::where('userId', $user->id)->first()->itemsList;
        }
        if (Cookie::get('cart') && !Session::has('user')) {
            $cartItemsNew =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $dataCartNew = unserialize(Cookie::get('cart'));
        };
        $data = [
            'pageTitle' => 'Cart',
            'categories' => Category::all(),
            'cartItems' => $cartItemsNew,
            'user' => $user,
            'cart' => $dataCartNew,
        ];
        // dd($data['cart']);
        //// End get data again after change cart

        //// notify user if cart changed
        if ($outofStockProduct > 0) {
            $message = 'There are ' . $outofStockProduct . ' product(s) out of stock, we have removed it from your cart';
            Session::flash('fail', $message);
        }
        //// End notify user if cart changed

        return view('front.cart.index', $data);
    }
    public function cartCheckout(Request $request)
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

        //// innit header data and get request info
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
            'pageTitle' => 'Checkout',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
            'subtotal' => $request->subtotal,
            'shipping' => $request->shipping,
            'discountAmount' => $request->discountAmount,
            'discountCode' => $request->discountCode,
            'finalPrice' => $request->finalPrice,

        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data and get request info

        return view('front.checkout.index', $data);
        // redirect to route checkoutindex with data
        // return redirect()->route('user.checkoutIndex', $data);
    }
}
