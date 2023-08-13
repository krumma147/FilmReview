<?php

// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CategoryController;
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

Route::get('/login', function () {
    return view('Login.login');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resources([
        'movies' => MovieController::class,
    ]);
});


Route::get('/register', [AuthenticatedController::class, 'registration'])->name('register');
Route::post('/register', [AuthenticatedController::class, 'create']);
Route::get('/login', [AuthenticatedController::class, 'index'])->name('login');
Route::post('/login', [AuthenticatedController::class, 'login']);
Route::post('/logout', [AuthenticatedController::class, 'signOut']);


