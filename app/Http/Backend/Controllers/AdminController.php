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

    public function orderManage(Request $request)
    {
        $query = Order::query();
        if (isset($request->status) && ($request->status != null)) {
            $query->where('status', $request->status);
        };
        if (isset($request->time) && ($request->time != null)) {
            switch ($request->time) {
                case 'today':
                    $query->whereDate('orderDate', now());
                    break;
                case 'yesterday':
                    $query->whereDate('orderDate', now()->subDay());
                    break;
                case 'week':
                    $query->whereBetween('orderDate', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereBetween('orderDate', [now()->startOfMonth(), now()->endOfMonth()]);
                    break;
                case 'year':
                    $query->whereYear('orderDate', now()->year);
                    break;
                default:
                    break;
            }
        }
        $result = $query->orderBy('id', 'DESC')->paginate(perPage: 15);
        $data = [
            'pageTitle' => 'Order Manage',
            'orders' => $result,
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
    public function userManage(Request $request)
    {
        $query = User::query();
        if (isset($request->status) && ($request->status != null)) {
            $query->where('blocked', $request->status);
        };
        if (isset($request->orderBy) && ($request->orderBy != null)) {
            switch ($request->orderBy) {
                case 1:
                    $query->orderBy('id', 'asc');
                    break;
                case 2:
                    $query->orderBy('id', 'desc');
                    break;
                case 3:
                    $query->orderBy('blocked', 'asc');
                    break;
                case 4:
                    $query->orderBy('blocked', 'desc');
                    break;
                default:
                    break;
            }
        };
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('username', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }
        $result = $query->paginate(perPage: 15);
        $data = [
            'pageTitle' => 'User Manage',
            'users' => $result,
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
        $admin = Admin::find($request->id);
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $admin->password = bcrypt($request->password);
        $admin->save();
        // return back()->with('success', 'Password has been updated successfully');
        return redirect()->route('admin.admin.manage')->with('success', 'Password has been updated successfully');
    }
}
