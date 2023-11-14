<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function profile() {
        if(!Auth::check()) {
            return back();
        }
        $user = User::find(Auth::user()->id);
        $edit = FALSE;
        return view('profile', compact('user', 'edit'));
    }

    public function editProfile(Request $request) {
        $edit = TRUE;
        $user = User::find(Auth::user()->id);
        return view('profile', compact('user', 'edit'));
    }
    public function updateProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        if($request->name) {
            $user->name = $request->name;
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
        $edit = FALSE;
        return redirect('/profile');
    }
}