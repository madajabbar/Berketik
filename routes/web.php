<?php

use App\Http\Controllers\CameraController;
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
Route::post('/', function () {
    return response('json');
});
Auth::routes();

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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [HomeController::class,'index']);
});

