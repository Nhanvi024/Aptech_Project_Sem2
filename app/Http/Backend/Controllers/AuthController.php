<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /** 
     * Admin Authentication
    */
    public function adminLoginForm(){
        $data =[
            'pageTitle' => 'Admin Login',
        ];
        return view('back.pages.auth.admin.login', $data);
    }

    public function adminForgotPasswordForm(){
        $data =[
            'pageTitle' => 'Admin Forgot Password',
        ];
        return view('back.pages.auth.admin.forgot-password', $data);
    }

    public function adminLoginHandle(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $request->validate([
                'login_id'=> 'required|email|exists:admins,email',
                'password'=> 'required|min:5', 
            ],[
                'login_id.required' => 'Enter your email or your username.',
                'login_id.email' => 'Invalid email address.',
                'login_id.exists' => 'Email or username does not exist.',
            ]);
        }else{
            $request->validate([
                'login_id'=> 'required|exists:admins,username',
                'password'=> 'required|min:5', 
            ],[
                'login_id.required' => 'Enter your email or your username.',
                'login_id.exists' => 'Email or username does not exist.',
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );

        if(Auth::guard('admin')->attempt($creds)){
            // Check Admin user was blocked
            if(Auth::guard('admin')->user()->blocked){
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.admin.login')->with('fail', 'Your account has been blocked.');
            }
            // Redirect admin to dasboard   
            return redirect()->route('admin.admin.dasboard', ['pageTitle' => "Admin Dashboard"]);
        }else{
            return redirect()->back()->with('fail', 'Invalid credentials.');
        }
    }



    /**
     * User Authentication
     */
     public function userRegisterForm(){
        $data =[
            'pageTitle' => 'User Registration',
        ];
        return view('back.pages.auth.user.register', $data);
     }

     public function userLoginForm(){
        $data =[
            'pageTitle' => 'User Login',
        ];
        return view('back.pages.auth.user.login', $data);
     }

     public function userForgotPasswordForm(){
        $data =[
            'pageTitle' => 'User Forgot Password',
        ];
        return view('back.pages.auth.user.forgot-password', $data);
     }
}
