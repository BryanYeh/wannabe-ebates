<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $clicks = Click::where('user_id',Auth::user()->id)->limit(5)->get();
        $total_clicks = Click::where('user_id',Auth::user()->id)->count();
        return view('dashboard/index', ['clicks' => $clicks,'total_clicks' => $total_clicks]);
    }
}
