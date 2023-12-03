<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\Schedule;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function profile() {
        if (!Auth::check()) {
            return back();
        }
        $user = User::find(Auth::user()->id);
        $booklist = BookList::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $transactions = Token::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('page.profile', compact('user', 'booklist', 'transactions'));        
    }

    public function editProfile(Request $request) {
        if(!Auth::check()) {
            return redirect('/');
        }
        $edit = TRUE;
        $user = User::find(Auth::user()->id);
        return view('page.profile', compact('user', 'edit'));
    }
    public function updateProfile(Request $request) {
        if(!Auth::check()) {
            return redirect('/');
        }
        $user = User::find(Auth::user()->id);
        if($request->name) {
            $user->name = $request->name;
        }
        if($request->gender) {
            $user->gender = $request->gender;
        }
        if($request->address) {
            $user->address = $request->address;
        }
        if ($request->img) {
            $file = $request->file('img');
        
            if (!file_exists('images/users/')) {
                mkdir('images/users/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/users/', $fileName);

            // Simpan nama file ke dalam database atau di tempat yang sesuai
            $user->img = $fileName;
    
        }
        $user->save();
        return redirect('/profile');
    }
}