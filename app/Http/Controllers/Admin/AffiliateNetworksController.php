<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AffiliateNetwork;

class AffiliateNetworksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function affiliates(Request $request)
    {
        $affiliates = AffiliateNetwork::paginate(5);
        return view('admin.affiliates',['affiliates'=>$affiliates]);
    }
    
    public function view(Request $request)
    {
        $affiliate = AffiliateNetwork::where('slug', $request->affiliate)->firstOrFail();
        return view('admin.affiliate-view',['affiliate'=>$affiliate]);
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function add(Request $request)
    {
        //
    }

    public function create(Request $request)
    {
        //
    }
}
