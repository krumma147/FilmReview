<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index(){
        $topMovies = Movie::orderBy('rating', 'desc')
            ->take(6)
            ->get();
        return view('welcome', compact('topMovies'));
    }

    public function login(){
        if(auth()->user()->userType == 1){
            return view('welcome');
        }else if(auth()->user()->userType == 2){
            return redirect()->action([MovieController::class, 'index']);
        }
    }
}
