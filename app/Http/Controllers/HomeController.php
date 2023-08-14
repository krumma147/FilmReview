<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(){
        if(auth()->user()->userType == 1){
            return view('welcome');
        }else if(auth()->user()->userType == 2){
            return redirect()->action([MovieController::class, 'index']);
        }
    }
}
