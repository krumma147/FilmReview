<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("User/index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id = null)
    {
        if(!isset($id)){
            return view("User/create");
        }else{
            $user = User::find($id);
            return View("User/create", compact('user'));
        }
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->usertype = $request->usertype;
        $user->save();
        return redirect("/users");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return View("User/show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $user = User::find($id);
    //     return View("User/create", compact('user'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email= $request->email;
        $user->save();
        return redirect("/users");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
