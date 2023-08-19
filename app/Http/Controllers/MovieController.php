<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkrole');
    }
    
    public function index()
    {
        $movies = Movie::paginate(10); // 10 movies per page
        //dd($movies); // Add this line to debug
        return view('Movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Movie.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->status = $request->status;
        $movie->overview = $request->overview;
        $movie->language = $request->language;
        $movie->rating = $request->rating;
        $movie->release_date = $request->release_date;

        $image = $request->file('image');
        if($image){
            $extension = $image->getClientOriginalExtension(); // Get the original file extension
            $imagename = time() . '.' . $extension; // Combine with timestamp to create a unique file name
            $image->move('images', $imagename);
            $movie->image_url = $imagename;
        }
        //dd($image);
        $movie->save();
        $movie->categories()->attach($request->input('Categories'));
        
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie= Movie::find($id);
        return view('Movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $categories = Category::all();
        return view('Movie.create', compact('movie'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->status = $request->status;
        $movie->overview = $request->overview;
        $movie->language = $request->language;
        $movie->rating = $request->rating;
        $movie->release_date = $request->release_date;

        $image = $request->file('image');
        if ($image) {
            $extension = $image->getClientOriginalExtension(); // Get the original file extension
            $imagename = time() . '.' . $extension; // Combine with timestamp to create a unique file name
            $image->move('images', $imagename);
            $movie->image_url = $imagename;
        }

        $movie->save();
        $categories = $request->input('Categories');
        $movie->categories()->attach($categories);

        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/movies');
    }

}
