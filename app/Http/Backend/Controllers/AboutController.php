<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function aboutUs(){
        $data =[
            'pageTitle' => 'About Us',
        ];
        return view('front.pages.about.aboutUs', $data);
    }
}
