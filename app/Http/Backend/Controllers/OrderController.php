<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $data = [
            'pageTitle' => 'Order Manage',
            'orders' => Order::all(),
        ];
        return view('back.pages.dasboard.admin.order-manage', $data);
    }
}
