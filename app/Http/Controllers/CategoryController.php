<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkrole');
    }
    
    public function index(Request $request)
    {
        $searchKey = $request->input('searchKey');
        if($searchKey){
            $query = Category::query();
            $query->where('name', 'like', '%' . $searchKey . '%');
            $categories = $query->paginate(10); // 10 movies per page
        return view('Category.index', compact('categories'));
        }
        $categories = Category::paginate(10); // 10 movies per page
        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::find($id);
        return view('Category.create', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Category::find($id);
        $cat->name = $request->name;
        $cat->save();
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('/categories');
    }
}
