<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordManager;
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

Auth::routes([
    'verify' => true
]);

Route::get('/roomdetail', function () {
    return view('roomdetail');
});

Route::get('/room', function () {
    return view('room');
});

Route::get('/aboutus', function () {
    return view('page.aboutus');
});

Route::get('/termncon', function () {
    return view('page.termncon');
});

Route::get('/policy', function () {
    return view('page.policy');
});

Route::get('/contactus', function () {
    return view('page.contactus');
});

// Route::get('/book', function () {
//     return view('book');
// });

Route::get('/', [HomeController::class, 'home']);

// Route::post('/signup-process', [UserController::class, 'signup'])->name('signup');
Route::get('/signup', [AuthController::class, 'signupPage'])->name('signupPage');
Route::post('/newuser', [AuthController::class, 'signup'])->name('signup');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::controller(UserController::class)->group(function () {
    Route::middleware('web')->group(function () {
        Route::get('/login', 'loginPage');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout');
        Route::post('/contactuss', 'contact')->name('contact');
    });
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/editprofile', 'editProfile')->name('edit_profile');
    Route::post('/profile-update', 'updateProfile')->name('update_profile');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('/{room}/all', 'findroom')->name('findroom');
    Route::get('/room/{site}', 'room')->name('room');
    Route::get('/{site}/{room}/details', 'room_details')->name('');
});

// Route::get('/addbranches', function () {
//     return view('admin.add_cabang');
// });


Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'user')->name('dashboard');

    Route::get('/transaction', 'check_trans')->name('trans');
    Route::get('/unaccept', 'remove')->name('remove');
    Route::get('/accept', 'accept')->name('acc');

    Route::get('/booklist', 'book_list')->name('booklist');
    Route::get('/done', 'done')->name('done');

    Route::post('/processbranch', 'add_cabang')->name('');
    Route::post('/processevent', 'add_event')->name('');

    Route::get('/addevent', 'event');
    Route::get('/addbranch', 'branch');
    Route::get('/addroom', 'rooms')->name('');
    Route::post('/processroom', 'add_room')->name('');
    Route::get('/scheduleroom', 'schedule_room')->name('');

    Route::get('/admin/contactus', 'contactus')->name('conadmin');
    Route::get('/addschedule', 'add_schedule')->name('add');
    Route::get('/{site}/{room}/admin', 'edit_schedule')->name('');

    Route::get('/transaction/log', 'trans_log')->name('');
    Route::get('/book/log', 'book_log')->name('');

    Route::get('/{user_id}/edit', 'edit_user')->name('edit_user');
    Route::post('/{user_id}/edit/process', 'edit_process')->name('editprocess');

});


Route::controller(BookController::class)->group(function () {
    Route::post('/book', 'book')->name('booking');
    Route::get('{site}/{room}/book', 'page')->name('book_page');
    Route::get('/token', 'token')->name('token');
    Route::post('/paymentdetail', 'buytoken')->name('buytoken');
    Route::post('/checkout', 'callback')->name('callback');
    Route::get('/bookdetails', 'book_details')->name('bookdetail');
});

Route::get("/forget-password", [ForgotPasswordManager::class, "forgetPassword"])
    ->name("forget.password");
Route::post("/forget-password", [ForgotPasswordManager::class, "forgetPasswordPost"])
    ->name("forget.password.post");

Route::get("/reset-password/{token}", [ForgotPasswordManager::class, "resetPassword"])
    ->name("reset-password");
Route::post("/reset-password", [ForgotPasswordManager::class, "resetPasswordPost"])
    ->name("reset.password.post");
// Route::get('/footer', function () {
//     return view('footer');
// })

// Route::get('/verifemail', [App\Http\Controllers\HomeController::class, 'VerifyEmail'])->name('verifemail');