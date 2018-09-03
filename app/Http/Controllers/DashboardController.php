<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use App\Payment;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $clicks = Click::where('user_id',$user_id)->limit(5)->get();
        $total_clicks = Click::where('user_id',$user_id)->count();
        $current_cashback = Payment::where('user_id',$user_id)->where('payment_status_id',4)->sum('amount');
        return view('dashboard/index', ['clicks' => $clicks,'total_clicks' => $total_clicks,'current_cashback'=> $current_cashback]);
    }

    public function settings(Request $request)
    {
        return view('dashboard/settings');
    }
}
