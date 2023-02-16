<?php

use App\Http\Controllers\backend\AccessController;
use App\Http\Controllers\backend\AccessManagementController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\RoomController;
use App\Http\Controllers\backend\UserManagementController;
use App\Http\Controllers\user\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});
Auth::routes();
// Route::resource('/camera', CameraController::class);
Route::get('/404',function () {
    return view('errors.404');
});
Route::get('/500',function () {
    return view('errors.500');
});
Route::get('/403',function () {
    return view('errors.403');
});
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('/home', DashboardController::class);
    Route::resource('/access', AccessController::class);
    Route::resource('/room', RoomController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user-management', UserManagementController::class);
    Route::resource('/access-management', AccessManagementController::class);

    Route::get('/user-management/role', [UserManagementController::class,'role']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [HomeController::class,'index']);
});
