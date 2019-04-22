<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function categories(Request $request){
        $categories = Category::paginate(5);
        return view('admin.categories',['categories'=>$categories]);
    }

    public function view(Request $request){
        $category = Category::where('slug', $request->category)->firstOrFail();
        return view('admin.category-view',['category'=>$category]);
    }

    public function edit(Request $request){
        //);
    }

    public function update(Request $request){
        //
    }

    public function remove(Request $request){
        //
    }
}
