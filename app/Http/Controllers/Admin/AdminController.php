<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Retailer;
use App\Category;
use App\Coupon;

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
        return view('admin.dashboard',['members' => $members,'stores' => $stores,'categories'=> $categories,'coupons'=>$coupons]);
    }
}