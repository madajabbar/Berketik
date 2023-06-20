<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $data = Auth::user();
        $user = $request->user()->currentAccessToken()->plainTextToken;
        $access = [];
        foreach($data->access as $key => $value){
            $access[] = $value->unique_key;
        }
       $data = new UserResource(Auth::user());
        $qr = $data->unique_key;
        return ResponseFormatter::success(
            [
                'user' => $data,
                // 'user' => $user->currentAccessToken()->plainTextToken,
                'qr-string' => $qr,
            ]
        );
    }
}
