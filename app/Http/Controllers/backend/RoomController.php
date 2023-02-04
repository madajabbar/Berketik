<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index(Request $request){
        $data['title'] = 'Ruangan';
        if ($request->ajax()) {
            $data = Room::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editProduct"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i></a>

                        ';
                })
                ->make(true);
        }
        return view('backend.room.index', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'ip_address' =>'required|string|min:0',
        ]);

        $data = Room::updateOrCreate(
            ['id'=> $request->id],
            [
                'name' => $request->name,
                'ip_address' => $request->ip_address,
                'slug' => Str::slug($request->name)
            ]
        );
        return $data;
    }

    public function edit($id){
        $data = Room::find($id);
        return $data;
    }

    public function destroy($id){
        $data = Room::find($id)->delete();
        return response()->json(['message','Deleted Success']);
    }
}
