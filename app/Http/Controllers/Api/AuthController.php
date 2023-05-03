<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            return ResponseFormatter::error([
                'message' => $e->getMessage(),
                'details' => $e->getTrace(),
            ],'Not Authenticated');
        }
    }
    public function logout(Request $request){
        $token = $request->user()->currentAccessToken()->delete();
        // dd($token);
        return ResponseFormatter::success($token, 'Token Revoked');
    }
    public function register(Request $request){
        try{
            $request->validate([
                'name' => ['required','string','max:255'],
                'email' => ['required','string','max:255','unique:users'],
                'password' => ['required','string'],
            ]);
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role_id' => 2,
                'password' => Hash::make($request->password),
                'unique_key' => Hash::make($request->email.'-'.'2')
            ]);
            $user = User::where('email',$request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'User Registered');
        }
        catch(Exception $e){
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ], 'User Unregistered', 500);
        }
    }
}
