<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZoomAccountController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ZoomAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
Route::get('/', function () {
    return view('home.index'); 
});



Route::get('/admins', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admins', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logoutadmin', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::get('admin/listadmins', [AdminAuthController::class, 'listadmins'])->name('listadmins');

Route::get('/addadmins', [AdminAuthController::class, 'addadmins'])->name('addadmins');
Route::post('/addadmins', [AdminAuthController::class, 'storeAdmin'])->name('admin.store');
Route::get('/editadmins/{id}', [AdminAuthController::class, 'editadmins'])->name('editadmins');
Route::put('/editadmins/{id}', [AdminAuthController::class, 'update'])->name('updateadmins');
Route::delete('/admin/useradmin/delete/{id}', [AdminAuthController::class, 'destroy'])->name('deleteadmin');
// zooom
Route::get('/admin/listzoompro', [ZoomAccountController::class, 'listzoompro'])->name('listzoompro');
Route::get('/admin/addzoompro', [ZoomAccountController::class, 'addzoompro'])->name('addzoompro');
Route::post('/admin/addzoompro', [ZoomAccountController::class, 'storezoompro'])->name('zoompro.store');
Route::get('/admin/editzoompro/{id}', [ZoomAccountController::class, 'editzoompro'])->name('editzoompro');
Route::put('/admin/editzoompro/{id}', [ZoomAccountController::class, 'update'])->name('updatezoompro');
Route::delete('/admin/zoompro/delete/{id}', [ZoomAccountController::class, 'destroy'])->name('deletezoompro');

Route::get('/zoom/createroom', [RoomController::class, 'createRoom'])->name('rooms.createRoom');

Route::post('/zoom/store', [RoomController::class, 'store'])->name('rooms.store');

Route::get('/zoom/room/{id}', [RoomController::class, 'show'])->name('rooms.room');



Route::get('/zoom/token', [ZoomAuthController::class, 'getAccessToken'])->name('zoom.token');
Route::get('/zoom/info', [ZoomAuthController::class, 'getUserInfo'])->name('zoom.info');
Route::get('/zoom/create-meeting', [ZoomAuthController::class, 'createZoomMeeting'])->name('zoom.createMeeting');
// price
Route::get('/admin/listprice', [PriceController::class, 'index'])->name('index.listprice');
Route::get('/admin/addprice', [PriceController::class, 'create'])->name('create');
Route::post('/admin/addprice', [PriceController::class, 'store'])->name('price.store');
Route::get('/admin/editprice/{id}', [PriceController::class, 'edit'])->name('editprices');
Route::put('/admin/editprice/{id}', [PriceController::class, 'update'])->name('updateprice');
Route::delete('/admin/price/delete/{id}', [PriceController::class, 'destroy'])->name('deleteprice');


// user

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('user.login')->middleware('guest');
Route::get('/welcome', [DashboardController::class, 'welcome'])->name('user.welcome')->middleware('auth');
Route::post('/loginn', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logoutt', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/register', [AuthController::class, 'showregisterform'])->name('user.register');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::get('/forgot', [AuthController::class, 'showforgotform'])->name('user.forgot');
Route::get('/resetPassword', [AuthController::class, 'showresetPassword'])->name('user.resetPassword');
Route::get('/admin/listuser', [UserController::class, 'index'])->name('index.listuser');
Route::get('/users/{user}/topup', [UserController::class, 'topupForm'])->name('user.topup');
Route::post('/users/{user}/topup', [UserController::class, 'topup'])->name('user.topup.store');
Route::get('/users/{user}/deduct', [UserController::class, 'deductForm'])->name('user.deduct');
Route::post('/users/{user}/deduct', [UserController::class, 'deduct'])->name('user.deduct.store');
Route::get('/users/{user}/change-password', [UserController::class, 'changePasswordForm'])->name('user.change-password');
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword'])->name('user.change-password.store');
Route::get('/admin/histories/plus', [HistoryController::class, 'plusList'])->name('histories.plus');
Route::get('/admin/histories/minus', [HistoryController::class, 'minusList'])->name('histories.minus');



Route::get('/login', function () {
    if (Auth::check()) { 
        return redirect()->route('user.welcome'); 
    }
    return view('user.login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/listorder', [OrderController::class, 'listorder'])->name('listorder');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/createorder', [OrderController::class, 'createorder'])->name('createorder');
    Route::get('/welcome', [DashboardController::class, 'welcome'])->name('user.welcome');

});
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('web')
    ->name('password.email');
Route::get('password-reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password-reset', [ResetPasswordController::class, 'reset'])->name('password.update');






require __DIR__.'/auth.php';
