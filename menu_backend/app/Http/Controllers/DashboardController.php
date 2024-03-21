<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        $messages = Message::with('topic')->orderBy('created_at', 'desc')->take(5)->get();
        $totalPrice = Meal::pluck('price')->sum();
        return view('admin.pages.index',compact('messages','totalPrice'));
    }
}
