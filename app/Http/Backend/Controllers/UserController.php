<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function userDasboard(){
        $data =[
            'pageTitle' => 'User Dasboard',
        ];
        return view('back.pages.dasboard.user.dashboard', $data);
    }
}
