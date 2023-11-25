<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('page.login');
});

Route::get('/signup', function () {
    return view('page.signup');
});

Route::get('/roomdetail', function () {
    return view('roomdetail');
});

Route::get('/room', function () {
    return view('room');
});

Route::get('/aboutus', function () {
    return view('page.aboutus');
});

Route::get('/book', function () {
    return view('book');
});

// Route::post('/signup-process', [UserController::class, 'signup'])->name('signup');

Route::controller(UserController::class)->group(function () {
    Route::get('/signup', 'signupPage');
    Route::get('/newuser', 'signup')->name('signup');

    Route::post('/login','loginPage');
    Route::get('/loginn','login')->name('login');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile','profile')->name('profile');
    Route::get('/editprofile','editProfile')->name('edit_profile');
    Route::post('/profile-update','updateProfile')->name('update_profile');
    });

Route::controller(RoomController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/room/{site}','room')->name('room');
    Route::get('/{site}/{room}','room_details')->name('');
});

Route::get('/addbranches', function () {
    return view('admin.add_cabang');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard','user')->name('dashboard');

    Route::post('/processbranch','add_cabang')->name('');

    Route::get('/addroom','rooms')->name('');
    Route::post('/processroom','add_room')->name('');

    
    Route::get('/addschedule','add_schedule')->name('add');
    Route::get('/addscheds','process_schedule')->name('');
}); 

Route::controller(BookController::class)->group(function () {
    Route::post('/book', 'book')->name('booking');
    Route::get('{site}/{room}/book', 'page');
});
// Route::get('/footer', function () {
//     return view('footer');
// });