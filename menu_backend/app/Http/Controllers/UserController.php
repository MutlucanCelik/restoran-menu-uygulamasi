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
}
