<?php

use App\Http\Backend\Controllers\AdminController;
use App\Http\Backend\Controllers\AuthController;
use App\Http\Backend\Controllers\CartsController;
use App\Http\Backend\Controllers\CategoriesController;
use App\http\Backend\Controllers\CheckOutController;
use App\Http\Backend\Controllers\OrderController;
use App\Http\Backend\Controllers\UserController;
use App\Http\Backend\Controllers\ProductsController;
use App\Http\Backend\Controllers\PayPalController;
use App\Http\Backend\Controllers\PostController;
use App\Http\Frontend\controllers\CartController;
use App\Http\Frontend\controllers\ShopController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Backend\Controllers\AboutUsController;
use App\Http\Backend\Controllers\DiscountController;
use App\Http\Frontend\controllers\ContactController;

/**
 * Admin Routes
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'adminLoginForm')->name('admin.login');
            Route::post('/login', 'adminLoginHandle')->name('admin.login-handle');
            Route::get('/forgot-password', 'adminForgotPasswordForm')->name('admin.forgot');
        });
    });
    Route::middleware('auth:admin')->group(function () {
        Route::controller(AdminController::class)->group(callback: function () {
            Route::get('/', 'orderManage')->name('order.manage');
            Route::get('/admin-manage', 'adminManage')->name('admin.manage');
            Route::get('/user-manage', 'userManage')->name('user.manage');
            Route::post('/create',  'store')->name('admin.store');
            Route::get('/changeblocked/{admin}', 'changeBlocked')->name('admin.changeBlocked');
            Route::get('/changePassword/{admin}', 'changePassword')->name('admin.changePassword');
            Route::post('/changePassword', 'changePasswordPost')->name('admin.changePasswordPost');
        });
        Route::controller(ProductsController::class)->prefix('products')->group(function () {
            route::post('/filter', 'filterProducts')->name('products.filter');
            route::post('/deactiveProduct', 'proTableActions')->name('products.proTableActions');
            route::get('/resetfilter', 'resetFilter')->name('products.resetFilter');
            Route::get('/removeImage/{id}/{image}', 'ImageRemove')->name('products.ImageRemove');
            Route::get('/setMainImage/{id}/{image}', 'ImageSetMain')->name('products.ImageSetMain');
        });
        Route::controller(UserController::class)->prefix('users')->group(function () {
            route::get('/changeBlocked/{user}',  'changeBlocked')->name('users.changeBlocked');
            route::post('/filter', 'filterUsers')->name('users.filter');
            route::post('/deactiveUser', 'userTableActions')->name('users.userTableActions');
            route::get('/resetfilter', 'resetFilter')->name('users.resetFilter');
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/index', 'index')->name('discount.index');
            Route::get('/discount/create', 'create')->name('discount.create');
            Route::post('/discount/create', 'store')->name('discount.store');
            Route::get('/discount/update/{id}', 'update')->name('discount.update');
        });

        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact/index1', 'index1')->name('contact.index1');
            Route::get('/contact/{id}', 'detail')->name('contact.detail');
            Route::get('/contact/reply/{id}', 'reply')->name('contact.reply');
            Route::post('/contact/sendEmail/{contacts}',  "sendEmail")->name("contact.sendEmail");
        });

        Route::resource('/products', ProductsController::class);
        Route::resource('/categories', CategoriesController::class);
        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
        Route::get('/orderDetails/{id}', [OrderController::class, 'orderDetails'])->name('order.orderDetails');
        Route::post('/orderDetails', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::controller(PostController::class)->group(function () {
            Route::get('/post', 'allPost')->name('posts');
            Route::get('/post/new', 'addPost')->name('add.post');
            Route::post('/post/new', 'store')->name('store.post');
            Route::get('/post/edit/{id}', 'edit')->name('edit.post');
            Route::post('/post/edit/{id}', 'update')->name('update.post');
            Route::get('/post/status/{id}', 'status')->name('status.post');
            Route::post('/post/change-visibility', 'changeVisibility')->name('change.visibility');
        });
    });
});

/**
 * User Routes
 */

Route::name('user.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'userLoginForm')->name('user.login');
            Route::post('/login', 'userLoginHandle')->name('user.login-handle');
            Route::get('/forgotpassword', 'userForgotPasswordForm')->name('user.forgotPassword');
            Route::post('/forgotpassword', 'userForgotPasswordHandle')->name('user.forgotPasswordPost');
            Route::get('/resetpassword/{email}/{token_login}/{token_password}', 'userResetPasswordForm')->name('user.resetPassword');
            Route::post('/resetpassword', 'userResetPasswordHandle')->name('user.resetPasswordPost');
        });
        Route::controller(UserController::class)->group(function () {});
        Route::get('/register', [AuthController::class, 'userRegisterForm'])->name('user.register');
        Route::post('/register', [AuthController::class, 'userRegisterFormPost'])->name('user.registerPost');
        Route::get('/mailConfirm', [AuthController::class, 'userMailConfirm'])->name('user.mailConfirm');
        Route::get('/verifyingemail/{email}/{token_email}', [AuthController::class, 'userVerifyEmail'])->name('verifyEmail');
    });

    Route::middleware('auth:web')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/logout', [AuthController::class, 'userLogout'])->name('user.logout');
            Route::get('/profile', 'profile')->name('user.profile');
            Route::put('/profile', 'updateProfile')->name('user.profileUpdate');
            Route::get('/profile/updatePassword', 'profileUpdatePassword')->name('user.profileUpdatePassword');
            Route::post('/profile/updatePassword', 'profileUpdatePasswordPost')->name('user.profileUpdatePasswordPost');
        });
        Route::get('/logout', [AuthController::class, 'userLogout'])->name('user.logout');
    });
    Route::get('/productDetail/{id}', [ShopController::class, 'productDetail'])->name('productDetail');
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart', [CartController::class, 'cartCheckout'])->name('user.cart.cartCheckout');
    Route::get('/addCart/{product}', [CartsController::class, 'addToCart'])->name('addCart');
    Route::get('/decreaseCart/{product}', [CartsController::class, 'decreaseCart'])->name('decreaseCart');
    Route::get('/updateCart/{id}/{value}', [CartsController::class, 'updateCartItem'])->name('updateCartItem');
    route::get('/removeFromCart/{id}', [CartsController::class, 'removeCartItem'])->name('removeCartItem');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkoutIndex');
    Route::post('/checkout', [CheckOutController::class, 'checkoutPost'])->name('checkoutPost');
    Route::get('/payment', [CheckOutController::class, 'paymentIndex'])->name('paymentIndex');
    Route::post('/payment', [CheckOutController::class, 'paymentPost'])->name('paymentPost');

    // Paypal
    route::post('/paypal/payment', [PayPalController::class, 'paypalPayment'])->name('paypal');
    route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('success');
    route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('cancel');
    // End paypal

    Route::controller(AboutUsController::class)->group(function () {
        Route::get('/about_us',  'index')->name('about.index');
    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact',  'index')->name('contact.index');
        Route::get('/contact/create', 'create')->name('contact.create');
        Route::post('/contact/create', 'store')->name('contact.store');
    });

    //news
    Route::get('/news', [PostController::class, 'news'])->name('news');
    Route::get('/news/{id}', [PostController::class, 'singleNews'])->name('single.news');
    Route::get('/news/{tag}', [PostController::class, 'postsByTag'])->name('posts.byTag');
    // End news
});
