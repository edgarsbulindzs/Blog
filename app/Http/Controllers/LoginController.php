<?php

namespace App\Http\Controllers;


use App\users;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request)
    {
        $message = 'user does not exist or you type incorect data';
        $this->validate($request, [
            'username' => 'required|username',
            'password' => 'required',
        ]);
        if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            $user = auth()->user();
            return view('dashboard.dashboard');
        } else {
            return redirect('/blog');
        }
    }

    public function validate(Request $request, array $rules,
                             array $messages = ['username', 'password'], array $customAttributes = ['username', 'password'])
    {

    }


}
