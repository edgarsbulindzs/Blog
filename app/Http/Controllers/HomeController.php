<?php

namespace App\Http\Controllers;

use App\Article;

//use App\Http\Middleware;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//       $this->middleware('Login');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.app');
    }
    public function home()
    {
        return view('base');
    }

    public function aboutus()
    {
        return view('aboutus');
    }
    public function gallery()
    {
        return view('Gallery');
    }
    public function production()
    {
        return view('production');
    }
    public function login()
    {
        return view('authentication.login');
    }
    public function registration()
    {
        return view('authentication.registration');
    }

}
