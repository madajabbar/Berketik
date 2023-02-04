<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AccessManagementController extends Controller
{
    public function index(Request $request){
        $data['title'] = 'Manajemen Akses Ruangan';
        // $data['role'] = Role::all();
        if ($request->ajax()) {
            $data = Access::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('room_id', function ($data){
                    return $data->room->name;
                })
                ->addColumn('user',function($data){
                    $tmp = [];
                    foreach($data->user as $user){
                        $tmp[] = ' '.$user->name;
                    }
                    return $tmp;
                })
                ->addColumn('action', function ($data) {
                    return '
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editProduct"><i class="fa fa-pen"></i></a>
                        ';
                })
                ->make(true);
        }
        return view('backend.access_management.index', $data);
    }

}
