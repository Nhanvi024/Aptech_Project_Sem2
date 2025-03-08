<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function adminDasboard()
    {
        $data = [
            'pageTitle' => 'Admin Dasboard',
        ];
        return view('back.pages.dasboard.admin.dashboard', $data);
    }

    public function orderManage()
    {
        $data = [
            'pageTitle' => 'Order Manage',
            'orders' => Order::orderBy('id', 'DESC')->get(),
        ];
        return view('back.pages.dasboard.admin.order-manage', $data);
    }
    public function adminManage()
    {
        $data = [
            'pageTitle' => 'Admin Manage',
            'admins' => Admin::all(),
        ];
        return view('back.pages.dasboard.admin.admin-manage', $data);
    }
    public function userManage()
    {
        $data = [
            'pageTitle' => 'User Manage',
            'users' => User::all(),
        ];
        return view('back.pages.dasboard.user.user-manage', $data);
    }

    public function store(Request $request)
    {
        $resultAdd = $request->validate([
            'username' => 'required|min:3|max:255|unique:admins',
            'email' => 'required|email|min:3|max:255|unique:admins',
            'password' => 'required|min:8|max:100|confirmed',
            'role' => 'required',
        ]);
        $resultAdd['password'] = bcrypt($request->password);
        $resultAdd['blocked'] = 0;
        Admin::create($resultAdd);

        return back()->with('success', 'New admin has been created successfully');
    }

    public function changeBlocked(Admin $admin)
    {
        if (Auth::user()->role == 'superAdmin') {
            if ($admin->role == 'superAdmin') {
                return back()->with('mess', 'Cannot block super admin');
            } else {
                $admin->blocked = $admin->blocked ? 0 : 1;
                $admin->save();
                return back()->with('mess', 'Status has been updated');
            }
        } else {
            return back()->with('mess', 'You are not authorized to change admin status');
        }
    }
    public function changePassword($id)
    {
        if (Auth::user()->role == 'superAdmin') {
            $admin = Admin::find($id);
        } else {
            return back()->with('fail', 'You are not authorized');
        }
        $admin = Admin::find($id);
        $data = [
            'admin' => $admin
        ];
        return view('back.pages.dasboard.admin.adminChangePassword', $data);
    }
    public function changePasswordPost(Request $request)
    {
        // dd($request->id);
        $admin = Admin::find($request->id);
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        // dd($admin);
        $admin->password = bcrypt($request->password);
        $admin->save();
        // return back()->with('success', 'Password has been updated successfully');
        return redirect()->route('admin.admin.manage')->with('success', 'Password has been updated successfully');
    }
}
