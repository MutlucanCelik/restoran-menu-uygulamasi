<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function show(){
        $setting = Setting::with('user')->first();

        return view('admin.pages.settings',compact('setting'));
    }

    public function store(Request $request){
        $setting = Setting::with('user')->first();
        $data = $request->except('_token');
        $setting->company_name = $data['company_name'];
        $setting->user->name = $data['name'];
        $setting->user->email = $data['email'];
        $setting->info = $data['info'];



        if($request->hasFile('image')){
            $imgFile = $request->file('image');
            $originalName = $imgFile->getClientOriginalName();
            $originalExtension = $imgFile->getClientOriginalExtension();
            $explodeName = explode('.',$originalName)[0];
            $fileName = Str::slug($explodeName) . '.' . $originalExtension;
            $publicPath = 'storage/settings/';
            $data['image'] = $publicPath . $fileName;
            $setting['image'] = $data['image'];
            $imgFile->storeAs('public/settings',$fileName);
        }
        $setting->user->save();
        $setting->save();


        return redirect()->back();

    }
}
