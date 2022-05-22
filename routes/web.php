<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\moviesDetails;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
}); */


Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/', [home::class, 'index']);
Route::get('/home', [home::class, 'index']);
Route::get('/movies/{id}', [moviesDetails::class, 'index']);
Route::get('/movies', function () {
    return view('movies');
});
Route::get('/series', function () {
    return view('series');
});
Route::get('/latest', function () {
    return view('latest');
});

// login pages
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/ret', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/homep', function () {
        return view('premium/home');
    })->name('home');
    Route::get('/moviesp', function () {
        return view('premium/movies');
    })->name('movies');
    Route::get('/seriesp', function () {
        return view('premium/series');
    })->name('series');
    Route::get('/latestp', function () {
        return view('premium/latest');
    })->name('latest');
});
