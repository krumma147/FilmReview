<?php

// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Movie.Admin.index');
});

Route::get('/admin', function () {
    return view('Movie.Admin.index');
});

Route::get('/login', function () {
    return view('Login.login');
});

Route::get('/register', [AuthenticationController::class, 'index'])->name('register');
Route::post('/register', [AuthenticationController::class, 'login']);
Route::get('/login', [AuthenticationController::class, 'create'])->name('login');
Route::post('/login', [AuthenticationController::class, 'store']);

Route::resources(
    [
        'users' => UserController::class,
        'movies' => MovieController::class,
        'categories' => CategoryController::class,
    ]
);