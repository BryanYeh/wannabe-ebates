<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Retailer;
use App\Coupon;
use App\Banner;

class IndexController extends Controller
{
    public function index()
    {
        $sample = Retailer::where('status',true)->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->limit(6)->get();
        $featured = Retailer::where('status',true)->where('featured_store',true)->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->limit(5)->get();
        $coupons = Coupon::where('status',true)->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->orderBy('start_date','ASC')->limit(20)->get();
        $ads300x250 = Banner::where('width',300)->where('height',250)->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->orderBy('start_date','ASC')->get()->random(3);
        return view('index' , ['sampleStores' => $sample,'featuredStores' => $featured,'coupons'=>$coupons,'ads300x250' => $ads300x250]);
    }
}
