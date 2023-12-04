<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function signupPage()
    {
        return view('page.signup');
    }
    public function signup(Request $request)
    {
        $user = User::create([
            'img' => 'contact.png',
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => bcrypt($request->password)
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }
}
