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
        if(Auth::check()) {
            return redirect('/');
        }
        $val = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
            if($val) {
                $user = new User();
                if(!$request->img) {
                    $user->img = 'contact.png';
                }
                // dd($request->all());
                // $user = User::create([
                //     'img' => 'contact.png',
                //     'name' => $request->name,
                //     'email' => $request->email,
                //     'address' => $request->address,
                //     'gender' => $request->gender,
                //     'no_telp' => $request->phone_number,
                //     'password' => bcrypt($request->password)
                // ]);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->no_telp = $request->phone_number;
                $user->password = bcrypt($request->password);
                $user->save();
                event(new Registered($user));
                Auth::login($user);
            }
        return redirect('/email/verify');
    }
}
