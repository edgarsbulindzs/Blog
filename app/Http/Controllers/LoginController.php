<?php

namespace App\Http\Controllers;


use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware;

class LoginController extends Controller
{



    public function login()
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request)
    {
            $user = auth()->user();
        if (auth()->attempt(['username' => $request->input('username'),
            'password' => $request->input('password')])) {

            $request->session()->put('username',$user);

            return redirect('/dashboard');
        } else {
            return back()->withInput()->withErrors(
                [
                    'username' => 'username or password is incorrect',
                ]);
        }

    }
//    public function red(){
//    if (auth()->guest() == true){
//        return redirect('/login');
//
//    }elseif(auth()->guest() == false){
//        return view('dashboard.dashboard');
//    }


    public function logout(Request $request)
    {
            $request->session()->flush();
            return redirect('/');
    }
}
