<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retailer;

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
}
