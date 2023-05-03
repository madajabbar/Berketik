<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $data = Auth::user();
        $user = $request->user()->currentAccessToken()->plainTextToken;
        $access = [];
        foreach($data->access as $key => $value){
            $access[] = $value->unique_key;
        }
        $user = Auth::user();
        
        $qr = $data->name.'-'.implode('-', $access);
        return ResponseFormatter::success(
            [
                'user' => $data,
                // 'user' => $user->currentAccessToken()->plainTextToken,
                'qr-string' => $qr,
            ]
        );
    }
}
