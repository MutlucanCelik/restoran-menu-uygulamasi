<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function show($id){
        $categoryId = $id;
        $category = Category::where('id',$categoryId)->first();
        $countries = Country::all();
        $meals = Meal::where('category_id',$categoryId)->with('getCountry')->get();
        return view('admin.pages.foods',compact('category','countries','meals'));
    }

    public function store(Request $request){
        $imgFile = $request->file('image');
        $originalName = $imgFile->getClientOriginalName();
        $originalExtension = $imgFile->getClientOriginalExtension();
        $explodeName = explode('.',$originalName)[0];

        $fileName = Str::slug($explodeName) . '.' . $originalExtension;

        $publicPath = 'storage/categories/';

        $data = $request->except('_token');
        $data['image'] = $publicPath . $fileName;


        Category::create($data);
        $imgFile->storeAs('public/categories',$fileName);
        return redirect()->back();

    }

    public function delete(Request $request){
        $category = Category::where('id',$request->category_id);
        $category->delete();

        return redirect()->back();
    }


}
