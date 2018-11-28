<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Retailer;
use App\Category;
use App\Coupon;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::count();
        $stores = Retailer::count();
        $categories = Category::count();
        $coupons = Coupon::count();
        $membersYear = DB::table("users")
	    ->select(DB::raw("MONTHNAME(created_at) as month,COUNT(*) as count"))
        ->groupBy(DB::raw("month"))
        ->whereYear('created_at',Carbon::now()->year)
        ->get();
        $arr = [];
        foreach($membersYear as $month){
            $arr[$month->month]=$month->count;
        }
        $registeredMember = (json_encode($arr));

        return view('admin.dashboard',['members' => $members,'stores' => $stores,'categories'=> $categories,'coupons'=>$coupons,'registered'=>$registeredMember]);
    }
}