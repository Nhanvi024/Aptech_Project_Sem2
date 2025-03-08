<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailRegisterVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    //
    // public function sendEmail(Request $request)
    // {
    //     dd($request->all());
    //     $details = [
    //         'title' => 'This is Sample Mail',
    //         'name' => 'NAMEEEEE',
    //         'email' => 'EMAAAAAAIL',
    //         'verificationLink' => Str::random(10),
    //         'body' => 'This is a simple mail sent using Laravel google stmp.'
    //     ];
    //     Mail::to('newbie0102@gmail.com')->send(new MailRegisterVerify($details));
    //     return "Email sent successfully !";
    // }
}
