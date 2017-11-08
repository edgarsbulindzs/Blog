<?php

namespace App\Http\Middleware;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$request->user()) {
            return redirect('/login');
        } elseif (auth()->attempt(['username' => $request->input('username'),
            'password' => $request->input('password')])) {

            $request->session()->put('username', $user);

            return redirect('/dashboard');


        }
        return $next($request);


    }}
