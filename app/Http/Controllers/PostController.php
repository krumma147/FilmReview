<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $searchKey = $request->input('searchKey');
        if($searchKey){
            $query = Post::query();
            $query->where('content', 'like', '%' . $searchKey . '%');
            $posts = $query->paginate(10); // 10 movies per page
        return view('Post.index', compact('posts'));
        }
        $posts = Post::paginate(10); // 10 movies per page
        return view("Post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view("Post.create", compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->content = $request->content;
        $post->uploadDate = $request->uploadDate;
        $post->rating = $request->rating;
        $post->movie_id = $request->movie;
        $post->author=auth()->user()->id;
        $post->save();
        return redirect("posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view("Post.create", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $movies = Movie::all();
        return view("Post.create", compact('post','movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->content = $request->content;
        $post->uploadDate = $request->uploadDate;
        $post->rating = $request->rating;
        $post->save();
        return redirect("posts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect("posts");
    }
}
