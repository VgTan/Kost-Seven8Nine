<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
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
    Route::get('/newuser', 'signup')->name('signup');

    Route::get('/login','loginPage');
    Route::get('/loginn','login')->name('login');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile','profile')->name('profile');
    Route::get('/editprofile','editProfile')->name('edit_profile');
    Route::post('/profile-update','updateProfile')->name('update_profile');
    });

Route::controller(RoomController::class)->group(function () {
    Route::get('/room/{site}','room')->name('room');
    Route::get('/{site}/{room}','room_details')->name('');
});
// Route::get('/footer', function () {
//     return view('footer');
// });
