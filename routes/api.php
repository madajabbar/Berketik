<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EdgeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\backend\CameraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', [UserController::class,'index']);


Route::resource('/camera', CameraController::class);
Route::get('/room', [EdgeController::class,'room']);
Route::get('/access', [EdgeController::class,'access']);
Route::get('/getuser', [EdgeController::class,'user']);
Route::post('/get',[EdgeController::class,'get']);
Route::post('/test',function (Request $request) {
    $data = Storage::append("arduino-log.txt",
        "Time: " . now()->format("Y-m-d H:i:s") . ', ' .
        "Temperature: " . $request->get("temperature", "n/a") . '°C, ' .
        "Humidity: " . $request->get("humidity", "n/a") . '%'
    );
    return response()->json(['success'=>$data]);
});
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);
Route::middleware(['auth:api'])->group(function(){
    Route::get('/user',[UserController::class,'index']);
    Route::get('/logout', [AuthController::class,'logout']);
});
