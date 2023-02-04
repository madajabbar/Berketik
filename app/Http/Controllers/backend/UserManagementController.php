<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AccessUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    public function index(Request $request){
        $data['title'] = 'Manajemen User';
        $data['role'] = Role::all();
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('access',function ($data){
                    $tmp = [];
                    foreach($data->access as $access){
                        $tmp[] = ' '.$access->name;
                    }
                    return $tmp;
                })
                ->addColumn('role', function ($data){
                    return $data->role->name;
                })
                ->addColumn('action', function ($data) {
                    return '
                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editProduct"><i class="fa fa-pen"></i></a>

                        ';
                })
                ->make(true);
        }
        return view('backend.user_management.index', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'ip_address' =>'required|string|min:0',
        ]);

        $data = User::updateOrCreate(
            ['id'=> $request->id],
            [
                'name' => $request->name,
                'ip_address' => $request->ip_address,
                'slug' => Str::slug($request->name)
            ]
        );
        return $data;
    }

    public function role(){
        return Role::all();
    }
    public function show(){
        return Role::all();
    }
    public function edit($id){
        $data = AccessUser::where('user_id', $id)->get();
        return $data;
    }
    public function destroy($id){
        // $data = User::find($id)->delete();
        // return response()->json(['message','Deleted Success']);
    }
}
