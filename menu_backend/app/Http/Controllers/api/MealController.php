<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function getMeals(){
        $meals = Meal::all();

        return response()->json($meals);
    }
}
