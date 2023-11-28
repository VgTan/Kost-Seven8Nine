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
            return view('page.signup');
        }
    }

    public function loginPage() {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('page.login');;
    }

    public function signup(Request $request) {
        if(Auth::check()) {
            return redirect('/');
        }
        $val = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
        ]);
            if($val) {
                $user = new User();
                if(!$request->img) {
                    $user->img = 'contact.png';
                }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                // return redirect('/login');
                return back()->with('success', 'You Have Registered');
            }
            else {
                return back()->with('failed', 'Invalid Register');
            }
    }

    public function login(Request $request) {
        $val = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:12'
        ]);
        if(Auth::attempt($val)) {
            $user = User::where('email', '=', $request->email)->first();
            if($user){
                // regenerate biar ga kena session fixation
                $request->session()->regenerate();
                
                return redirect('/')->with('success', 'Login Successfuly');
            }
            else {
                return back()->with('no', 'Invalid Email');
            }
        }
        else {
            return back()->with('failed', 'Invalid Email/Password!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->intended('/');
    }

    public function roomsdirect(Request $request) {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('roomdetail');;
    }
}