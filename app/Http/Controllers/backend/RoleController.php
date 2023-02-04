<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request){
        $data['title'] = 'Role';
        if ($request->ajax()) {
            $data = Role::latest()->get();
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
        return view('backend.role.index', $data);
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
        ]);

        $data = Role::updateOrCreate(
            ['id'=>$request->id],
            [
                'name' => $request->name
            ]
        );
        return $data;
    }

    public function edit($id){
        $data = Role::find($id);
        return $data;
    }

    public function destroy($id){
        $data = Role::find($id)->delete();
        return response()->json(['message','Deleted Success']);
    }
}
