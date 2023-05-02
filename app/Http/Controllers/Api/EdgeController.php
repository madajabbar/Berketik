<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Camera;
use App\Models\Log;
use App\Models\Room;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class EdgeController extends Controller
{
    public function room()
    {
        $room = Room::all();
        return response()->json(
            $room
        );
    }
    public function access()
    {
        $access = Access::all();
        return response()->json(
            $access
        );
    }
    public function user()
    {
        $user = User::select('id','name', 'unique_key')->get();
        return response()->json(
            $user
        );
    }
    public function get(Request $request)
    {
        try {
            $request->validate(
                [
                    'access_id' => 'required',
                    'user_id' => 'required',
                ]
                );
            $data = Log::create(
                [
                    'access_id' => intval($request->access_id),
                    'user_id' => intval($request->user_id),
                    'status' => 'success',
                    ]
                );
                // dd(intval($request->access_id));
            return ResponseFormatter::success(
                [
                    'data' => $data,
                ], 'Log Created Successfully'
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                [
                    'message' => $e->getMessage(),
                    'error' => $e->getTrace(),
                ]
            );
        }
    }
}
