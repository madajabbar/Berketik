<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Log;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Home';
        $data['log'] = Log::orderBy('id','DESC')->take(5)->get();
        // dd($data['log']);
        $data['room'] = Room::all();
        $data['user'] = User::all();
        $data['access'] = Access::all();
        return view('backend.dashboard.index',$data);
    }
}
