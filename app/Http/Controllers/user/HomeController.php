<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['user'] = User::find(Auth::user()->id);
        // dd($data['user']->access);
        $data['date'] = Carbon::now()->format('Y-m-d');
        $data['qr'] = QrCode::size(400)->generate($data['user']->name.'-'.$data['user']->access);
        return view('home',$data);
    }
}
