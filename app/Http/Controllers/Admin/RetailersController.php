<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retailer;
use App\AffiliateNetwork;

class RetailersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function retailers(Request $request)
    {
        //public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);
        //mypage.com/articles?page=2
        $retailers = Retailer::paginate(5);
        return view('admin.retailers',['retailers'=>$retailers]);
    }

    public function edit(Request $request)
    {
        $retailer = Retailer::where('slug',$request->retailer)->first();
        $affiliate_networks = AffiliateNetwork::select('id','name','slug')->get();
        return view('admin.retailer-edit',['retailer'=>$retailer,'affiliate_networks'=>$affiliate_networks]);
    }

    public function view(Request $request)
    {
        $retailer = Retailer::where('slug',$request->retailer)->first();
        return view('admin.retailer-view',['retailer'=>$retailer]);
    }

    public function delete(Request $request)
    {
        //
    }
}
