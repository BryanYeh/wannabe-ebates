<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use App\Payment;
use App\PaymentStatus;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $clicks = Click::where('user_id',$user_id)->orderBy('created_at','DESC')->limit(5)->get();
        $total_clicks = Click::where('user_id',$user_id)->count();
        $current_cashback = Payment::where('user_id',$user_id)->where('payment_status_id',4)->sum('amount');
        return view('dashboard/index', ['clicks' => $clicks,'total_clicks' => $total_clicks,'current_cashback'=> $current_cashback]);
    }

    public function withdrawal(Request $request)
    {
        $user_id = Auth::user()->id;
        $paymentId = PaymentStatus::where('slug', 'confirmed')->first()->id;
        $payments = Payment::where('user_id',$user_id)->where('payment_status_id',$paymentId)->get();
        return view('dashboard/withdrawal',['payments' => $payments]);
    }

    public function settings(Request $request)
    {
        return view('dashboard/settings');
    }

    public function trips(Request $request)
    {
        $user_id = Auth::user()->id;
        $clicks = Click::where('user_id',$user_id)->orderBy('created_at','DESC')->get();
        return view('dashboard/trips', ['clicks' => $clicks]);
    }
}
