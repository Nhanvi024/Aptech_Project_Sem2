<?php

use App\Http\Backend\Controllers\AboutController;
use App\Http\Backend\Controllers\AdminController;
use App\Http\Backend\Controllers\AuthController;
use App\Http\Backend\Controllers\DiscountController;
use App\Http\Backend\Controllers\UserController;
use App\Http\Backend\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Admin Routes
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'adminLoginForm')->name('admin.login');
            Route::get('/forgot-password', 'adminForgotPasswordForm')->name('admin.forgot');

            Route::post('/login', 'adminLoginHandle')->name('admin.login-handle');
        });
    });

    Route::middleware('auth:admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'adminDasboard')->name('admin.dasboard');
            Route::get('/admin-manage', 'adminManage')->name('admin.manage');
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/index', 'index')->name('discount.index');
            Route::get('/discount/create', 'create')->name('discount.create');
            Route::post('/discount/create', 'store')->name('discount.store');
            Route::get('/discount/update/{id}', 'update')->name('discount.update');
            Route::post('/discount/apply-discount',  'applyDiscount')->name('discount.apply');
            
            Route::get('/discount/test', 'test')->name('discount.test');
            Route::get('/discount/remove-discount', 'removeDiscount')->name('discount.remove');
        });

        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact/index1', 'index1')->name('contact.index1');
            Route::get('/contact/{id}', 'detail')->name('contact.detail');
            Route::get('/contact/reply/{id}', 'reply')->name('contact.reply');
            Route::post('/contact/sendEmail/{contacts}',  "sendEmail")->name("contact.sendEmail");
        });
    });

});

/**
 * User Routes
 */

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/register', 'userRegisterForm')->name('user.register');
            Route::get('/login', 'userLoginForm')->name('user.login');
            Route::get('/forgotpassword', 'userForgotPasswordForm')->name('user.forgot');
        });
    });

    Route::middleware('auth:web')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'userDasboard')->name('user.dasboard');
        });
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact',  'index')->name('contact.index');      
        Route::get('/contact/create', 'create')->name('contact.create');
        Route::post('/contact/create', 'store')->name('contact.store');
    });

    Route::controller(AboutController::class)->group(function () {
        Route::get('/about_us',  'aboutUS')->name('about.aboutUs');      

    });


});
