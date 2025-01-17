<?php

use App\Http\Backend\Controllers\AdminController;
use App\Http\Backend\Controllers\AuthController;
use App\Http\Backend\Controllers\UserController;
use App\Http\Backend\Controllers\ProductsController;
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
        route::get('/products/changeStatus/{product}', [ProductsController::class,'changeStatus'])->name('products.changeStatus');
        Route::resource('/products', ProductsController::class);
    });

    // Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
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
});
