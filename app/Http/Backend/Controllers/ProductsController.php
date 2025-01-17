<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $data = [
            'pageTitle' => 'Products Manager',
            'products' => Product::with('category')->paginate(10)
        ];
        return view('back.pages.products.admin.index', $data);
    }
    public function changeStatus(Product $product)
    {
        $product->proStatus = !$product->proStatus;
        $product->save();
        return back();
        // return back()->with('success', 'Status has been updated');
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('back.pages.products.admin.edit', compact('product', 'categories'));
    }
}
