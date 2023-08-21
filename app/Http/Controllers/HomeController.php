<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $topMovies = $this->getMovies();
        $posts = $this->getPosts();
        $authors = $this->getAuthors();
        $recentMovies = $this->getRecentMovies();
        return view('welcome', compact('topMovies', 'posts', 'authors', 'recentMovies'));
    }

    public function login(){
        if(auth()->user()->userType == 1){
            $topMovies = $this->getMovies();
            $posts = $this->getPosts();
            $authors = $this->getAuthors();
            $recentMovies = $this->getRecentMovies();
            return view('welcome', compact('topMovies', 'posts', 'authors', 'recentMovies'));
        }else if(auth()->user()->userType == 2){
            return redirect()->action([MovieController::class, 'index']);
        }
    }

    public function moviePage(){
        $topMovies = $this->getMovies();
        $posts = $this->getPosts();
        $authors = $this->getAuthors();
        $recentMovies = $this->getRecentMovies();
        return view('layouts.MoviePage.home', compact('topMovies', 'posts', 'authors', 'recentMovies'));
    }

    function getMovies(){
        $topMovies = Movie::orderBy('release_date', 'desc')
            ->take(6)
            ->get();
        return $topMovies;
    }

    function getPosts(){
        $posts = Post::orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return $posts;
    }

    function getAuthors(){
        $authorIds = $this->getPosts()->pluck('author');
        $authors = User::whereIn('id', $authorIds)->get();
        return $authors;
    }

    function getRecentMovies(){
        $movies = Movie::orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return $movies;
    }
}
