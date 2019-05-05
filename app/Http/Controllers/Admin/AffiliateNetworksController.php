<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AffiliateNetwork;
use Validator;
use Illuminate\Support\Facades\Storage;

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
        $affiliate = AffiliateNetwork::where('slug', $request->affiliate)->firstOrFail();
        return view('admin.affiliate-edit',['affiliate'=>$affiliate]);
    }

    public function update(Request $request)
    {
        $affiliate = AffiliateNetwork::where('slug', $request->affiliate)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'website' => 'required|url',
            'slug' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.affiliate.edit',['affiliate'=>$request->slug])
                        ->withErrors($validator)
                        ->withInput();
        }

        $logo = $affiliate->logo;
        
        if($request->hasfile('logo')){ 
            $file = $request->file('logo');
            $extension = $file->extension();
            $filename = str_slug($request->affiliate.'-'.str_random(5)).'.'.$extension;
            $path = $file->storeAs('affiliate_network', $filename, 'public_images');
            
            // delete old image
            if(Storage::disk('public_images')->exists($logo)){
                Storage::disk('public_images')->delete($logo);
            }

            $logo = $path;
        }

        $affiliate->name = strip_tags($request->name);
        $affiliate->website = $request->website;
        $affiliate->slug = $request->slug;
        $affiliate->subid = strip_tags($request->subid);
        $affiliate->status = $request->has('status');
        $affiliate->logo = $logo;
        $affiliate->save();

        return redirect()->route('admin.affiliate.view',['affiliate'=>$affiliate->slug])->with('message', 'Successfully Updated!');
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
