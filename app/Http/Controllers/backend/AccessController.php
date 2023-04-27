<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class AccessController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Akses';
        $data['room'] = Room::all();
        $data['day'] = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];
        if ($request->ajax()) {
            $data = Access::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('room_id', function ($data) {
                    return $data->room->name;
                })
                ->addColumn('action', function ($data) {
                    return '
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editProduct"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i></a>

                        ';
                })
                ->make(true);
        }
        return view('backend.access.index', $data);
    }

    public function store(Request $request)
    {
        $data = Access::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'room_id' => $request->room_id,
                'day' => $request->day,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
                'unique_key' => Hash::make($request->name.'-'.$request->room_id),
            ]
        );
        return $data;
    }

    public function edit($id){
        $data = Access::find($id);
        return $data;
    }

    public function destroy($id){
        $data = Access::find($id)->delete();
        return response()->json(['message','Deleted Success']);
    }
}
