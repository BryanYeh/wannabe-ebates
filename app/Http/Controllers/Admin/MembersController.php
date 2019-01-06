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
use Datatables;
use Hashids;
use App\Click;
use Validator;

class MembersController extends Controller
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

    public function members()
    {
        return view('admin.members');
    }

    public function membersList()
    {
        $users = User::select(['id', 'first_name', 'last_name', 'email','total_cashback', 'created_at'])->get();

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.route("admin.member.edit",["user"=>Hashids::encode($user->id)]).'" class="btn btn-xs btn-primary"><i class="nav-icon icon-note"></i> Edit</a>
                <a href="'.route("admin.member.view",["user"=>Hashids::encode($user->id)]).'" class="btn btn-xs btn-primary"><i class="nav-icon icon-magnifier"></i> View</a>
                <a href="'.route("admin.member.remove",["user"=>Hashids::encode($user->id)]).'" class="btn btn-xs btn-danger"><i class="nav-icon icon-trash"></i> Remove</a>';
            })
            ->editColumn('name', '{{$first_name}} {{$last_name}}')
            ->editColumn('registered_at','{{ Carbon\Carbon::parse($created_at)->format("M d,Y") }}')
            ->editColumn('cashback','${{number_format($total_cashback, 2)}}')
            ->make(true);
    }

    public function remove(Request $request)
    {
        dd(Hashids::decode($request->user));
    }

    public function view(Request $request)
    {
        $user_id = Hashids::decode($request->user);
        $user = User::where('id', $user_id)->firstOrFail();
        $clicks = Click::where('user_id',$user_id)->orderBy('created_at','DESC')->get();
        return view('admin.member-view',['user'=>$user,'clicks'=>$clicks]);
    }

    public function edit(Request $request)
    {
        $user_id = Hashids::decode($request->user);
        $user = User::where('id', $user_id)->firstOrFail();
        return view('admin.member-edit',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $user_id = Hashids::decode($request->user);
        $user = User::where('id', $user_id)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.member.edit',['user'=>$request->user])
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->status = $request->has('status');
        $user->save();

        return view('admin.member-edit',['user'=>$user]);
    }
}
