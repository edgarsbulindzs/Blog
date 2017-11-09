<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\users;
use App;
use App\Http\Middleware;


class UserController extends Controller
{

    /**    public function __construct()
    //    {
    //       $this->middleware('Login');
    //    }
     * UserController constructor.
     */
//
//
//    public function __construct()
//    {
//        $this->middleware('Login')->except('create','dsa');
//    }

    public function create()
    {
        return view('authentication.registration');

    }

//    public function dsa()
//    {
//
//
//        $user_id = auth()->user()->id;
//        $user = users::find($user_id);
//        return view('dashboard.dashboard')->with('articles', $user->articles);
//
//    }


    public function store(Request $request)
    {
        $input = request()->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'password' => 'required',
            'password_confirmation'=>'required'


        ], [
            'username.required' => 'username is required',
            'first_name.required' => 'first_name is required',
            'last_name.required' => 'last_name is required',
            'country.required' => 'country is required',
            'city.required' => 'city is required',
            'password.required' => 'Password is required',
            'password_confirmation'=>'Confirm password'

        ]);
        $input = request()->all();
        $input['password'] = bcrypt($input['password']);
        $user = users::create($input);
        return back()->with('success', 'User created successfully.');

//        users::create([
//            'username' => request('username'),
//            'first_name' => request('first_name'),
//            'last_name' =>request('last_name'),
//            'country' => request('country'),
//            'city' => request('city'),
//            'password' => bcrypt(request('password')),
//        ]);

    }

}
