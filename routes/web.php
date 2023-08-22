<?php

use App\Http\Controllers\Auth\AuthenticatedController;
// use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'login'])->middleware("auth");
Route::get('/moviehome', [HomeController::class, 'moviePage'])->middleware("auth");
Route::get('/about', [HomeController::class, 'about']);
Route::get('/moviedetail/{id}', [HomeController::class, 'MovieDetail']);
Route::get('/filter-movies', [HomeController::class, 'filterMovies'])->name('filterMovies');

Route::resources([
        'users' => UserController::class,
        'movies' => MovieController::class,
        'categories' => CategoryController::class,
        'posts' => PostController::class,
]);

// Route::middleware(['auth', 'checkrole:admin'])->group(function () {
//     Route::resource('movies', MovieController::class);
//     // Other admin-only routes
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
