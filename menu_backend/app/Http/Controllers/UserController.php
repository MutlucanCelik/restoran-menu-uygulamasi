<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::with('reservations')->get();

        return view('admin.pages.users',compact('users'));
    }

    public function changeStatus(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->status = !$user->status;
        $user->save();

        return redirect()->back();
    }
}
