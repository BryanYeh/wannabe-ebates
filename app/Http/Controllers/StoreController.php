<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Retailer;
use App\Coupon;
use App\Banner;
use App\Category;
use Illuminate\Support\Str;
use App\Click;

use Auth;
use App\User;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $retailer = Retailer::where('slug', $request->slug)->firstOrFail();
        $retailer_id = $retailer->id;
        $coupons = Coupon::where('status',true)->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->where('retailer_id',$retailer_id)->orderBy('start_date','ASC')->get();
        return view('store-view',['coupons'=>$coupons, 'retailer' => $retailer]);
    }

    public function access(Request $request)
    {
        $retailer = Retailer::where('slug', $request->slug)->firstOrFail();
        $type_id = $retailer->id;
        $type = 'App\Retailer';
        $trip_number = (string) Str::uuid();

        // $authUser = User::where('provider_id', '108231634796713828755')->first();
        // Auth::login($authUser, true);

        if (Auth::check()) {
            $user_id = Auth::id();

            $click = new Click;
            $click->trip_number = $trip_number;
            $click->clickable_id = $type_id;
            $click->clickable_type = $type;
            $click->user_id = $user_id;
            $click->save();
        }
        
        return view('accessing-store',['trip_number'=>$trip_number,'tracking_link'=>$retailer->tracking_link]);
    }

    public function show(Request $request)
    {
        $retailers = Retailer::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('position','asc')->get();
        return view('stores',['retailers'=>$retailers,'categories'=>$categories]);
    }
}
