<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(){
        $messages = Message::with(['user','topic'])->get();
        return view('admin.pages.messages',compact('messages'));
    }
}
