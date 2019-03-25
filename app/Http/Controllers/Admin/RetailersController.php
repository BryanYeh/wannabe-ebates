<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retailer;
use App\AffiliateNetwork;
use Validator;
use Illuminate\Support\Facades\Storage;
use Purifier;

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

    public function update(Request $request)
    {
        $retailer = Retailer::where('slug', $request->retailer)->firstOrFail();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'website' => 'required|url',
            'tracking_link' => 'required|url',
            'program_id' => 'required',
            'start_date' => 'required|date_format:"Y-m-d H:i:s"',
            'end_date' => 'date_format:"Y-m-d H:i:s"|after_or_equal:start_date',
            'affiliate_network' => 'required|exists:affiliate_networks,id',
            'logo' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.retailer.edit',['retailer'=>$request->retailer])
                        ->withErrors($validator)
                        ->withInput();
        }

        $logo = $retailer->logo;
        
        if($request->hasfile('logo')){ 
            $file = $request->file('logo');
            $extension = $file->extension();
            $filename = str_slug($request->retailer.'-'.str_random(5)).'.'.$extension;
            $path = $file->storeAs('logos', $filename, 'public_images');
            
            // delete old image
            if(Storage::disk('public_images')->exists($logo)){
                Storage::disk('public_images')->delete($logo);
            }

            $logo = $path;
        }

        if (filter_var($logo, FILTER_VALIDATE_URL)) {
            $contents = file_get_contents($logo);
            $extension = 'jpg';
            $filename = 'logos/'.str_slug($request->retailer.'-'.str_random(5)).'.'.$extension;
            Storage::disk('public_images')->put($filename, $contents);
            $logo = $filename;
        }
        
        $retailer->name = strip_tags($request->name);
        $retailer->website = $request->website;
        $retailer->tracking_link = $request->tracking_link;
        $retailer->program_id = $request->program_id;
        $retailer->description = Purifier::clean($request->description);
        $retailer->conditions = clean($request->conditions);
        $retailer->tags = strip_tags($request->tags);
        $retailer->seo_title = strip_tags($request->seo_title);
        $retailer->meta_description = strip_tags($request->meta_descripton);
        $retailer->meta_keywords = strip_tags($request->meta_keywords);
        $retailer->start_date = $request->start_date;
        $retailer->end_date = $request->end_date;
        $retailer->status = $request->has('request->status');
        $retailer->affiliate_network_id = $request->affiliate_network;
        $retailer->store_of_week = $request->has('store_of_week');
        $retailer->featured_store = $request->has('featured_store');
        $retailer->logo = $logo;
        $retailer->save();

        return redirect()->route('admin.retailer.edit',['retailer'=>$request->retailer])->with('message', 'Successfully Updated!');
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
