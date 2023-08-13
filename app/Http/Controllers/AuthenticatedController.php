<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->userType == 1) {
                return redirect("/")->withSuccess('Login successful!');
            } elseif (auth()->user()->userType == 2) {
                return redirect("/movies")->withSuccess('Login successful!');
            }
        }
        return redirect("login")->withErrors('Invalid credentials or account type!');
        
    }

    public function registration()
    {
        return view('auth.register');
    }
       
 
    public function create(Request $request)
{  
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
    ]);
    
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'userType' => $request->userType,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('dashboard')->with('success', 'You have signed in.');
}
 
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }    
     
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
   
        return redirect("login")->withSuccess('You are not allowed to access');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}