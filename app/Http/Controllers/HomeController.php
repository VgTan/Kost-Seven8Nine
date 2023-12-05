<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->status == 'admin') return redirect()->route('dashboard');   
        }
        
        $room = Branch::all();
        $event = Event::orderBy('created_at', 'desc')->take(3)->get();
        $home = TRUE;
        return view('welcome', compact('room', 'event', 'home'));
    }
}
