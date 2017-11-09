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

    public function __construct()
    {
        $this->middleware('Login')->except('create','dsa');
    }

    public function create()
    {
        return view('authentication.registration');

    }



    public function store(Request $request)
    {
        users::create([
            'username' => request('username'),
            'first_name' => request('first_name'),
            'last_name' =>request('last_name'),
            'country' => request('country'),
            'city' => request('city'),
            'password' => bcrypt(request('password')),
        ]);

        return redirect('/dashboard' );



    }

}
