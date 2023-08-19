<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(MovieController $movieController){
        $topMovies = Movie::orderBy('release_date', 'desc')
            ->take(6)
            ->get();

        $posts = Post::orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $users = User::all();
        $authorIds = $posts->pluck('author');
        $authors = User::whereIn('id', $authorIds)->get();
        return view('welcome', compact('topMovies', 'posts', 'authors'));
    }

    public function login(){
        if(auth()->user()->userType == 1){
            return view('welcome');
        }else if(auth()->user()->userType == 2){
            return redirect()->action([MovieController::class, 'index']);
        }
    }
}
