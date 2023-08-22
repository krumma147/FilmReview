<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        // $topMovies = $this->getMovies();
        $posts = $this->getPosts();
        $authors = $this->getAuthors();
        $recentMovies = $this->getRecentMovies();
        $categories = $this->getCategories();
        $movies = $this->getAllMovies();
        return view('layouts.MoviePage.home', compact('topMovies', 'authors', 'recentMovies', 'categories', 'movies'));
    }

    public function MovieDetail(string $id){
        $posts = $this->getPosts();
        $authors = $this->getAuthors();
        $movie = $this->getMovie($id);
        return view('MovieDetail', compact('authors','movie', 'posts'));
    }

    public function filterMovies(Request $request)
{
    $categories = $this->getCategories();
    $topMovies = $this->getMovies();
    $categoryIds = $request->input('categories');
    $filteredMovies = Movie::when($categoryIds, function ($query, $categoryIds) {
        $query->whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        });
    })->paginate(10);

    return view('layouts.MoviePage.home', compact('filteredMovies','categories', 'topMovies'));
}

    public function about(){
        return view('about');
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

    function getCategories(){
        $categories = Category::all();
        return $categories;
    }

    function getAllMovies(){
        $movies = Movie::all();
        return $movies;
    }

    function getMovie(string $id){
        $movie = Movie::find($id);
        return $movie;
    }
}
