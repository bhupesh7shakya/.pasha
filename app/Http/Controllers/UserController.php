<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function loginIndexAdmin()
    {
        return view('admin.authentication.login');
    }
    public function check(Request $request)
    {
        $request->validate([

            'email'=>'required|email|max:255|min:10',
            'password'=>'required|min:5|max:255'
        ]);
        if(Auth::attempt($request->except('_token'))){
           return Redirect::route('admin.dashboard');
        }else{
            return Redirect::back()->with('msg','Wrong Credentials');
        }
    }
}