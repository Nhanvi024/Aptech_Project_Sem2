<?php

namespace App\http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function paypalPayment(Request $request)
    {
        // dd($request->all());
        Session::put('orderInfos', $request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken =  $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.success'),
                "cancel_url" => route('user.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->finalPrice // thay doi thang gia tien trong request
                    ]
                ]
            ]
        ]);

        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    Session::put('paypal_order_id', $response['id']);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            // dd('Payment failed');
            // return redirect()->back()->with('fail', 'Payment lalala failed');
            return redirect()->route('user.cancel');
        }
    }

    public function paymentSuccess(Request $request)
    {
        // dd('thanh cong toi day r');
        // dd($request->all());

        //// Get orderInfos from session
        if (Session::has('orderInfos')) {
            $orderInfos = Session::get('orderInfos');
        }
        // dd($orderInfos);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken =  $provider->getAccessToken();
        // dd($paypalToken);
        $response = $provider->capturePaymentOrder($request->token);
        $orderInfos['order_id'] = $response['purchase_units'][0]['payments']['captures'][0]['id'];
        //// End get orderInfos from session

        //// get all data to create Order
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
        // dd($cartItems);
        $totalCost = 0;
        foreach ($cartItems as $item) {
            $totalCost += $item->proCost * $dataCart[$item->id];
        }
        $userId = null;
        if (Session::has('user')) {
            $userId = Auth::id();
        }
        $orderInfos['userId'] = $userId;
        $orderInfos['itemsList'] = $dataCart;
        $orderInfos['totalCost'] = $totalCost;
        //// End get data create order


        // dd($orderInfos);


        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            //// Create Order
            Order::create([
                'userId' =>                     $orderInfos['userId'],
                'orderName' =>                  $orderInfos['orderName'],
                'orderEmail' =>                 $orderInfos['orderEmail'],
                'orderPhone' =>                 $orderInfos['orderPhone'],
                'orderAddress' =>               $orderInfos['orderAddress'],
                'shippingName' =>               $orderInfos['shippingName'],
                'shippingPhone' =>              $orderInfos['shippingPhone'],
                'shippingAddress' =>            $orderInfos['shippingAddress'],
                'itemsList' =>                  $orderInfos['itemsList'],
                'note' =>                       $orderInfos['note'],
                'totalCost' =>                  $orderInfos['totalCost'],
                'shipping' =>                   $orderInfos['shipping'],
                'finalPrice' =>                 $orderInfos['finalPrice'],
                'discountCode' =>               $orderInfos['discountCode'],
                'payment_id' =>                 $orderInfos['order_id']
            ]);
            //// End Create Order

            //// decrease proStock products in cart
            foreach ($orderInfos['itemsList'] as $key => $value) {
                // dd($key . ', ' . $value);
                $product = Product::where('id', $key)->first();
                // dd($product);
                $product->proStock -= $value;
                $product->save();
            }
            //// End decrease proStock products in cart

            //// clear cart
            if (Session::has('user')) {
                Session::forget('cart');
                if (Session::has('user')) {
                    // clear cart not delete
                    $Cart = Cart::where('userId', $userId)->first();
                    $Cart->itemsList = [];
                    $Cart->save();
                }
            } else {
                Cookie::queue(Cookie::forget('cart'));
            }
            //// end clear cart

            //// change Discount count
            $discountCode = $orderInfos['discountCode'];
            if ($discountCode) {
                $discount = Discount::where('code', $discountCode)->first();
                $oldUsed_by = $discount->used_by;

                if (Arr::has($oldUsed_by, $userId)) {
                    $newUsed_by = Arr::set($oldUsed_by, $userId, $oldUsed_by[$userId] + 1);
                } else {
                    $newUsed_by = Arr::add($oldUsed_by, $userId, 1);
                }
                $discount->used_by = $newUsed_by;
                $discount->quantity -= 1;
                $discount->save();
            }
            //// End change Discount count

            //// clear orderInfos in session
            Session::forget('orderInfos');
            //// end clear orderInfos in session

            return redirect()->route('user.shop')->with('success', 'Thank you for your order !');
        } else {
            //// clear orderInfos in session
            if (Session::has('orderInfos')) {
                Session::forget('orderInfos');
            }
            //// End clear orderInfos in session
            return redirect()->back()->with('fail', 'Payment failed');
        }
    }

    public function paymentCancel()
    {
        // dd('canceled roi');

        //// clear orderInfos in session
        if (Session::has('orderInfos')) {
            Session::forget('orderInfos');
        }
        //// End clear orderInfos in session

        return redirect()->route('user.shop')->with('fail', 'Payment cancelled');
    }
}
