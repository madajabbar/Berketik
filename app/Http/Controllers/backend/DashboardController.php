<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Home';
        $data['log'] = Log::latest(5);
        return view('backend.dashboard.index',$data);
    }
}
