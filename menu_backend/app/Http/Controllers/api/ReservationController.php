<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function store(Request $request){
        $data =[
            'user_id' => $request->input('user_id')
        ];

        Reservation::create($data);
        return response()->json(['message' => 'success'])->setStatusCode(200);
    }
}
