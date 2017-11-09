<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
class DashboardController extends Controller
{
//    public function dsa(users $users)
//    {
//
//
//
//            $articles = $users->article()->latest()->get();
//            return view('dashboard.dashboard', compact('articles'));
//
//
//
//    }
    public function dsa(Request $request)
    {
//

        $user = $request->user();

        $articles = Article::where('user_id', $user->id)->get();
        return view('dashboard.dashboard', compact('articles'));
    }
}