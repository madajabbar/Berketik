<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\AccessUser;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
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
                    $show = "/access-management/".$data->slug;
                    $create = "/access-management/".$data->id."/edit";
                    return '
                        <a href="'.$show.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editProduct"><i class="fa fa-eye"></i></a>

                        <a href="'.$create.'" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        ';
                })
                ->make(true);
        }
        return view('backend.access_management.index',$data);
    }

    public function edit($id){
        $data['title'] = 'Tambah Akses User';
        $data['access'] = Access::find($id);
        $data['access_user'] = AccessUser::where('access_id',$id)->pluck('user_id');
        $data['user'] = User::whereNotIn('id',$data['access_user'])->get();
        // dd($data['user']);
        return view('backend.access_management.form.index',$data);
    }

    public function store(Request $request){
        $i = 0;
        // foreach($request->add as $key){
        //     $key;
        //     // AccessUser::create(
        //     //     [
        //     //         'access_id'=>$request->access_id,
        //     //         'user_id'=>$request->user_id
        //     //     ]
        //     // );
        // }
        // dd($i);
        // dd($request->access_id);
        dd($request->user_id);
        $count = Count($request->add);
        foreach($request->add as $key){
            if($key == 'on'){
                AccessUser::create(
                    [
                        'access_id'=>$request->access_id,
                        'user_id'=>$request->user_id[$i]
                    ]
                );
                // dd('test');
            }
            else{
                // dd('false test');
            }
            $i++;
        }
        return 'success';

    }

    public function show($slug, Request $request){
        $access = Access::where('slug', $slug)->first();
        $data['slug'] = $access->slug;
        $data['title'] = 'User Yang Memiliki Akses '.$access->name;
        if ($request->ajax()) {
            $data = AccessUser::where('access_id', $access->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data){
                    return $data->user->name;
                })
                ->addColumn('role', function ($data){
                    return $data->user->role->name;
                })
                ->addColumn('action', function ($data) {
                    return '
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i></a>
                        ';
                })
                ->make(true);
        }
        return view('backend.access_management.show.index',$data);
    }

    public function destroy($id){
        $data = AccessUser::find($id)->delete();
        return response()->json(['message','Deleted Success']);
    }

}
