<?php

namespace App\Http\Frontend\controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index(Request $request)
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

        //// filter products
        if ($request->priceFrom > $request->priceTo) {
            return back()->with('fail', 'price From must < price To');
        }
        if ($request->priceFrom < 0 || $request->priceTo < 0) {
            return back()->with('fail', 'prices must greater or equal than 0');
        }
        $query = Product::query();
        if (isset($request->nameFil) && ($request->nameFil != null)) {
            $query->where('proName', 'like', '%' . $request->nameFil . '%');
        }
        if (isset($request->priceFrom) && isset($request->priceTo)) {
            $min = 0;
            $max = 10000;
            if ($request->priceFrom !== null) {
                $min = $request->priceFrom;
            }
            if ($request->priceTo !== null) {
                $max = $request->priceTo;
            }
            $query->whereBetween('proPrice', [$min, $max]);
        }
        if (isset($request->categoryFil) && ($request->categoryFil != 0)) {
            $query->whereIn('category_id', $request->categoryFil);
        }
        $result = $query->where('proActive', 1)->where('proStock',  ">", 1)->with('category')->paginate(6);
        //// End filter products

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
            'products' => $result, // remove when dont need filter products
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

        return view('front.products.index', $data);
    }
    public function productDetail($id)
    {
        // dd('toi day');
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
        $product = Product::where('id', $id)->with('category')->first();
        if ($product == null) {
            return redirect()->route('user.shop')->with('fail', 'Product not found');
        }
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
            'product' => $product,
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

        return view('front.products.productDetail', $data);
    }
}
