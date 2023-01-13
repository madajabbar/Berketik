<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['user'] = Auth::user();
        $data['date'] = Carbon::now()->format('Y-m-d');
        return view('home',$data);
    }
}
