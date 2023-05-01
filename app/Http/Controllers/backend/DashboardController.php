<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Home';
        $data['log'] = Log::latest()->take(5)->get();
        return view('backend.dashboard.index',$data);
    }
}
