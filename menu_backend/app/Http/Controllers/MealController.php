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
        dd($request->id);
    }
}
