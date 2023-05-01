<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Home';
        $data['log'] = Log::orderBy('id','DESC')->take(5)->get();
        dd($data['log']);
        return view('backend.dashboard.index',$data);
    }
}
