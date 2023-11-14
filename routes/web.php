<?php

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
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

// Route::post('/signup-process', [UserController::class, 'signup'])->name('signup');

Route::controller(UserController::class)->group(function () {
    Route::get('/signup', 'signupPage');
    Route::get('/newuser', 'signup')->name('signup')->middleware('isLoggedIn');

    Route::get('/login','loginPage');
    Route::get('/loginn','login')->name('login')->middleware('isLoggedIn');;
    Route::get('/logout','logout')->name('logout');
});


// Route::get('/footer', function () {
//     return view('footer');
// });
