<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Retailer;
use App\Coupon;
use App\Banner;
use Illuminate\Support\Str;
use App\Click;

use Auth;
use App\User;

class CouponController extends Controller
{
    public function access(Request $request)
    {
        $retailer = Retailer::where('slug', $request->slug)->firstOrFail();
        $campaign = $retailer->coupons()->where('uuid', $request->uuid)->firstOrFail();
        

        $type_id = $campaign->id;
        $type = 'App\Coupon';
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

        return view('accessing-store',['trip_number'=>$trip_number,'tracking_link'=>$campaign->link]);
    }
}
