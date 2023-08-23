<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function moviePage(Request $request){
        $searchKey = $request->input('searchKey');
        if($searchKey){
            $query = Movie::query();
            $query->where('title', 'like', '%' . $searchKey . '%');
            $movies = $query; // 10 movies per page
        }else{
            $movies = $this->getAllMovies();
        }
        $topMovies = $this->getMovies();
        $posts = $this->getPosts();
        $authors = $this->getAuthors();
        $recentMovies = $this->getRecentMovies();
        $categories = $this->getCategories();
        return view('MoviePage', compact('topMovies', 'authors', 'recentMovies', 'categories', 'movies'));
    }

    public function MovieDetail(string $id){
        $movie = Movie::find($id);
        if (!$movie) {
            return redirect()->route('moviehome')->with('error', 'Movie not found');
        }
        $posts = $movie->posts()->get();
        $authors = $this->getAuthors();
        return view('MovieDetail', compact('movie', 'posts', 'authors'));
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

    return view('MoviePage', compact('filteredMovies','categories', 'topMovies'));
    }


    public function createReview(Request $request, string $movieId){
        $post = new Post();
        $post->content = $request->content;
        $post->uploadDate = Carbon::now();
        $post->rating = $request->rating;
        $post->movie_id = $movieId;
        $post->author = Auth::user()->id;
        $post->save();
        return redirect('/moviedetail/'.$movieId);
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
