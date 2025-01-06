<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function adminDasboard(){
        $data =[
            'pageTitle' => 'Admin Dasboard',
        ];
        return view('back.pages.dasboard.admin.dashboard', $data);
    }

    public function adminManage(){
        $data =[
            'pageTitle' => 'Admin Manage',
            'admins' => Admin::all(),
        ];
        return view('back.pages.dasboard.admin.admin-manage', $data);
    }
}
