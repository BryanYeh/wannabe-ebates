<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Purifier;
use Validator;

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
        $category = Category::where('slug', $request->category)->firstOrFail();
        $categories = Category::select('id','name')->get();
        return view('admin.category-edit',['category'=>$category,'categories'=>$categories]);
    }

    public function update(Request $request){
        $category = Category::where('slug', $request->category)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent' => 'required|integer|exists:categories,id',
            'title' => 'required',
            'slug' => 'required',
            'position' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.category.edit',['category'=>$request->category])
                        ->withErrors($validator)
                        ->withInput();
        }

        $category->name = strip_tags($request->name);
        $category->parent = $request->parent;
        $category->title = strip_tags($request->title);
        $category->slug = str_slug($request->slug);
        $category->description = Purifier::clean($request->description);
        $category->meta_description = strip_tags($request->meta_descripton);
        $category->meta_keywords = strip_tags($request->meta_keywords);        
        $category->status = $request->has('status');
        $category->position = $request->position;
        $category->save();

        return redirect()->route('admin.category.edit',['category'=>$category->slug])->with('message', 'Successfully Updated!');
    }

    public function remove(Request $request){
        //
    }
}
