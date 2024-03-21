<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function show(){
        $reservations = Reservation::with(['user','meal'])->get();

        return view('admin.pages.reservation',compact('reservations'));
    }
}
