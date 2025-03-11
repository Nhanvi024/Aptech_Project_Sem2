<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartsController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        //// get cart if user logged in (cart in DB)
        if (Session::has('user')) {
            $cart = Cart::where('userId', Session::get('user')->id)->first();
            $listOld = $cart->itemsList;
            if (Arr::has($listOld, $product->id)) {
                if ($listOld[$product->id] < $product->proStock) {
                    $listNew = Arr::set($listOld, $product->id, $listOld[$product->id] + 1);
                } else {
                    return response()->json([
                        'message' => 'Product is out of stock',
                    ]);
                }
            } else {
                $listNew = Arr::add($listOld, $product->id, 1);
            }
            $cart->itemsList = $listNew;
            $cart->save();
        }
        //// get cart if user not logged in (cart in cookie)
        else {
            if (!Cookie::get('cart')) {
                $listNew = Arr::add([], $product->id, 1);
            } else {
                $listOld = unserialize(Cookie::get('cart'));
                if (Arr::has($listOld, $product->id)) {
                    if ($listOld[$product->id] < $product->proStock) {
                        $listNew = Arr::set($listOld, $product->id, $listOld[$product->id] + 1);
                    } else {
                        return response()->json([
                            'message' => 'Product is out of stock',
                        ]);
                    }
                } else {
                    $listNew = Arr::add($listOld, $product->id, 1);
                }
            }
            Cookie::queue('cart', serialize($listNew), 43200);
        }

        return response()->json([
            'message' => 'success',
        ]);
    }
    public function decreaseCart(Request $request, Product $product)
    {
        //// decrease product quantity in cart user logged in (cart in DB)
        if (Session::has('user')) {
            $cart = Cart::where('userId', Session::get('user')->id)->first();
            $listOld = $cart->itemsList;
            if (Arr::has($listOld, $product->id) && $listOld[$product->id] > 1) {
                Arr::set($listOld, $product->id, $listOld[$product->id] - 1);
            }
            else {
                Arr::forget($listOld, $product->id);
            }
            $cart->itemsList = $listOld;
            $cart->save();
        }
        //// decrease product quantity in cart user not logged in (cart in Cookie)
        else {
            if (Cookie::get('cart')) {
                $listOld = unserialize(Cookie::get('cart'));
                if (Arr::has($listOld, $product->id) && $listOld[$product->id] > 1) {
                    Arr::set($listOld, $product->id, $listOld[$product->id] - 1);
                }
                else {
                    Arr::forget($listOld, $product->id);
                }
                Cookie::queue('cart', serialize($listOld), 43200);
            }
        }

        return response()->json([
            'message' => 'success',
        ]);
    }
    public function updateCartItem($id, $value)
    {
        $product = Product::where('id', $id)->first();
        // dd($product);

        //// increase product quantity in cart user logged in (cart in DB)
        if (Session::has('user')) {
            $cart = Cart::where('userId', Session::get('user')->id)->first();
            $listOld = $cart->itemsList;
            if (Arr::has($listOld, $id)) {
                ////ensure no higher than stock
                if ($value < $product->proStock) {
                    Arr::set($listOld, $id, $value);
                } else {
                    Arr::set($listOld, $id, $product->proStock);
                }
            }
            $cart->itemsList = $listOld;
            $cart->save();
        }
        //// increase product quantity in cart user not logged in (cart in Cookie)
        else {
            if (Cookie::get('cart')) {
                $listOld = unserialize(Cookie::get('cart'));
                // dd($listOld[$id]);
                if (Arr::has($listOld, $id)) {
                    ////ensure no higher than stock
                    if ($value < $product->proStock) {
                        Arr::set($listOld, $id, $value);
                    } else {
                        Arr::set($listOld, $id, $product->proStock);
                    }
                }
                Cookie::queue('cart', serialize($listOld), 43200);
            }
        }

        return response()->json([
            'message' => 'success',
        ]);
    }
    public function removeCartItem($id)
    {
        //// remove product with id provided from DB or Cookie
        if (Session::has('user')) {
            $cart = Cart::where('userId', Session::get('user')->id)->first();
            $listOld = $cart->itemsList;
            Arr::forget($listOld, $id);
            $cart->itemsList = $listOld;
            $cart->save();
        } else {
            if (Cookie::get('cart')) {
                $listOld = unserialize(Cookie::get('cart'));
                Arr::forget($listOld, $id);
                Cookie::queue('cart', serialize($listOld), 43200);
            }
        }

        // return response()->json([
        //     'message' => 'success',
        // ]);
        return redirect()->back();
    }
}
