<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signupPage() {
        if(Auth::check()) {
            return redirect('/');
        }
        else {
            return view('signup');
        }
    }
    public function loginPage(Request $request) {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('login');;
    }
    public function signup(Request $request) {
        if(Auth::check()) {
            return redirect('/');
        }
        $user = new User();
        $user->full_name = $request->name;
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return view('welcome');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            // regenerate biar ga kena session fixation
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->intended('/');
    }
}