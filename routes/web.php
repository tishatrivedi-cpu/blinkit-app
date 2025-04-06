<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/admin',function(){
    return view('header');
});

Route::resource('/category', CategoryController::class);

Route::resource('/banner', BannerController::class);

Route::resource('/coupon', CouponController::class);

Route::resource('/pincode', PincodeController::class);

Route::resource('/store', StoreController::class);

Route::resource('/product', ProductController::class);

Route::get('/logout',[AdminController::class, 'logout']);

Route::resource('/subcategory', SubcategoryController::class);

Route::get('/',[AdminController::class,'open_login']);

Route::post('/login',[AdminController::class,'login']);

Route::get('/forgotpassword', [AdminController::class, 'open_forgot_pwd']);

Route::post('/forgot_password', [AdminController::class, 'forgot_password']);

Route::post('/reset_password', [AdminController::class, 'reset_password']);

Route::get('/home',[AdminController::class,'home']);
    
Route::get('/register',[AdminController::class, 'open_register']);

Route::post('/register_admin',[AdminController::class, 'register']);

Route::post('/api_register',[ApiController::class,'register']);

Route::post('/api_login', [ApiController::class, 'login_user']);

Route::get('/api_data',[ApiController::class,'getdata']);

Route::get('/allusers', [PersonController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);

Route::post('/profile', [AdminController::class, 'edit_profile']);

Route::get('/open_profile', [AdminController::class, 'open_profile']);

Route::get('/open_changepassword', [AdminController::class, 'open_changepassword']);

Route::post('/changepassword', [AdminController::class, 'changepassword']);

Route::post('/api_addorder',[ApiController::class, 'addorder']);
Route::post('/api_getorder', [ApiController::class, 'getorder']);
Route::post('/api_updateqty', [ApiController::class, 'updateqty']);
Route::post('/api_removeorder', [ApiController::class, 'removeOrder']);

Route::get('/search_product', [ProductController::class, 'search_product']);

Route::post('/api_applycoupon', [ApiController::class, 'getCouponFromCode']);

Route::post('/api_confirmOrder', [ApiController::class, 'confirmOrder']);

Route::post('/api_getOrderhistory', [ApiController::class, 'getOrderhistory']);

// Route:
Route::get('status/{id}', [PersonController::class, 'block_unblock']);

Route::post('/api_editprofile', [ApiController::class, 'editprofile']);

Route::get('/status_order/{id}', [OrderController::class, 'status']);
Route::post('/search', [AdminController::class, 'search']);


Route::get('/order-status-data', [OrderController::class, 'getOrderStatusData']);