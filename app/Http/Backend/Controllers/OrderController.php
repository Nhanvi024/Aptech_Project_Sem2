<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    // public function index()
    // {
    //     $data = [
    //         'orders' => Order::paginate(1),
    //     ];
    //     return view('back.pages.dasboard.admin.order-manage', $data);
    // }

    public function orderDetails($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('fail', 'found no order with id ' . $id);
        }
        $itemsList = $order->itemsList;
        $productsIdList = array_keys($itemsList);
        $productsList = Product::whereIn('id', $productsIdList)->get();
        // dd($productsList);
        // dd($itemsList);

        $data = [
            'order' => $order,
            'itemsList' => $itemsList,
            'productsList' => $productsList,
        ];
        return view('back.pages.dasboard.admin.orderDetails', $data);
    }
    public function updateStatus(Request $request)
    {
        // dd($request->orderId);
        $order = Order::find($request->orderId);
        if ($order == null) {
            return redirect()->back()->with('fail', 'found no order with id provided');
        }
        $order->status = 1;
        $order->deliveryDate = now();
        $order->save();
        // return back()->with('success', 'Status has been updated');
        return redirect()->route('admin.order.manage')->with('success', 'Order finished !!!');
    }
}
