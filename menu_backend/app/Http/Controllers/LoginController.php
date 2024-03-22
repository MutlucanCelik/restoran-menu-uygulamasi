<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $userName = $request->user_name;
        $password = $request->password;

        if($userName == 'admin' && Auth::attempt(['user_name'=> $userName,'password' => $password])){
            return redirect()->route('index');
        }else{
            return redirect()->route('login_page')->withErrors(['message' => 'Bilgilerinizi kontrol edin']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login_page');
    }
}
