<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
            $request->validate(
                [
                    'email'=>'required|email',
                    'password'=>'required'
                ]
            );
            $credentials = request(['email', 'password']);
            if(!Auth::attempt($credentials)){
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ],'Authentication Failed', 500);
            }
            $user = User::where('email', $request['email'])->first();
            if(!Hash::check($request['password'],$user->password, [])) {
                throw new \Exception('Invalid credentials');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ],'Authenticated');

        }
        catch(Exception $e){
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ],'Authenticated');
        }
    }
    public function logout(Request $request){
        $request->user()->token()->revoke();
    }
    public function register(){

    }
}
