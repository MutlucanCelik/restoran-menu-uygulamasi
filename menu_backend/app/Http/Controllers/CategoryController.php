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


}
