<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MealController extends Controller
{
    public function store(Request $request){
        $imgFile = $request->file('image');
        $originalName = $imgFile->getClientOriginalName();
        $originalExtension = $imgFile->getClientOriginalExtension();
        $explodeName = explode('.',$originalName)[0];

        $fileName = Str::slug($explodeName) . '.' . $originalExtension;

        $publicPath = 'storage/meals/';

        $data = $request->except('_token');
        $data['image'] = $publicPath . $fileName;
        $data['status'] = isset($data['status']) ? 0 : 1;


        Meal::create($data);
        $imgFile->storeAs('public/meals',$fileName);
        return redirect()->back();

    }

    public function changeStatus(Request $request){
        $food = Meal::where('id',$request->id)->first();
        $food->status = !$food->status ;
        $food->save();
        return redirect()->back();
    }
    public function edit(Request $request){
        $meal = Meal::with(['getCountry'])->where('id',$request->id)->first();
        return response()->json($meal);
    }
    public function update(Request $request){
        $meal = Meal::where('id',$request->id)->first();
        $meal->name = $request->name;
        $meal->country_id = $request->country_id;
        $meal->description = $request->description;
        $meal->price = $request->price;
        $meal->status = isset($request->staus) ? 0 : 1;

        if($request->hasFile('image')){
            $imgFile = $request->file('image');
            $originalName = $imgFile->getClientOriginalName();
            $originalExtension = $imgFile->getClientOriginalExtension();
            $explodeName = explode('.',$originalName)[0];
            $fileName = Str::slug($explodeName) . '.' . $originalExtension;
            $publicPath = 'storage/meals/';
            $meal['image'] = $publicPath . $fileName;
            $imgFile->storeAs('public/meals',$fileName);
        }
        $meal->save();

        return redirect()->back();
    }

    public function detail(Request $request){
        $meal = Meal::with(['getCountry','getCategory'])->where('id',$request->id)->first();

        return response()->json($meal);
    }

    public function delete(Request $request){
        $meal = Meal::where('id',$request->id)->first();
        $meal->delete();
        return redirect()->back();
    }

}
