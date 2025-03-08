<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $data = [
            'pageTitle' => 'Categories',
            'categories' => Category::all(),
        ];
        return view('back.pages.categories.index', $data);
    }
}
