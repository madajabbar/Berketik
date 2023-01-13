<?php

use App\Http\Controllers\CameraController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/camera', CameraController::class);
Route::post('/test',function (Request $request) {
    Storage::append("arduino-log.txt",
        "Time: " . now()->format("Y-m-d H:i:s") . ', ' .
        "Temperature: " . $request->get("temperature", "n/a") . '°C, ' .
        "Humidity: " . $request->get("humidity", "n/a") . '%'
    );
});
