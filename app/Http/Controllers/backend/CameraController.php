<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Camera;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $room = Room::all();
        return response()->json($room);
    }
    public function store(Request $request)
    {
        $ruangan_id = $request->room_id;
        $str = 'admin-$2y$10$hIZWeevyuMNaAvWrmbSNt.cBlEtvOcZDU5DQfLWbKT3.Ci7bL..Dy-testi-testi-testimoni';
        $expld = explode('-', $str);
        $arr = Access::whereIn('unique_key',$expld)->where('room_id',$ruangan_id)->get();
        $user = User::where('name',$expld[0])->first();
        $room = [];
        foreach($arr as $data){
            $room[]=$data->room_id;
        }
        $ruangan = Room::whereIn('id',$room)->first();
        // dd($ruangan->id == $ruangan_id);
        if ($ruangan->id == $ruangan_id){
            Camera::create([
                'room_id' => $request->room_id,
                'user_id' => $user->id,
                'status' => 'success'
            ]);
            return response()->json([
                'success' => true,
               'response_code' => 200,
            ]);
        }
        else{
            return response()->json([
                'success' => false,
               'response_code' => 403,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     $data = Camera::create(['link' => $request->input('link')]);

    //     // do something with the data
    //     // save it to the database, etc.

    //     return response()->json(['status' => 'success']);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $access = Access::all();
        return response()->json(
            $access
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
