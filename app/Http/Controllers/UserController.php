<?php

namespace App\Http\Controllers;

use App\Models\GoogleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function loginIndexAdmin()
    {
        return view('admin.authentication.login');
    }
    public function check(Request $request)
    {
        $request->validate([

            'email' => 'required|email|max:255|min:10',
            'password' => 'required|min:5|max:255'
        ]);
        if (Auth::attempt($request->except('_token'))) {
            return Redirect::route('admin.dashboard');
        } else {
            return Redirect::back()->with('msg', 'Wrong Credentials');
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        // echo "<pre>";
        // print_r((array)$user);
        // $user = (array)$user;
        // $user['google_id'] = $user->id;]
        // dd($user);
        $check = GoogleUser::updateOrCreate(
            [
                'google_id' => $user->id
            ],[
            'name' => $user->name,
            'email' => $user->email,
            'avatar'=>$user->avatar,
            'google_token' => $user->token,
            'google_refresh_token' => $user->refreshToken,
            ]
        );
        if($u=User::find($check->id)):
            Auth::login($u);
            // return Redirect::route('home.index');
        else:
           $u= User::updateOrCreate(
                [
                    'email' => $user->email
                ],[
                'name' => $user->name,
                'google_id'=>$check->id,
                'password' => bcrypt($user->id),
                'remember_token' => $user->token,
                'isAdmin' => 0,
                ]
            );
            Auth::login($u);
        endif;
        return Redirect::to(Session::get('url.intended'));
        // return redirect();
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to(Session::get('url.intended'));
    }
}
