<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\BranchRoom;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function book(Request $request) {
        if(!Auth::check()) return back();
        $book = new BookList();
        // dd($request);
        // $nau = BookList::where('branch', $request->branch_name)
        // ->where('room', $request->room)
        // ->where('date', $request->date)
        // ->where('time', $request->time)->first();
        // dd($nau);
        $user = User::find(Auth::user()->id);
        if(BookList::where('branch', $request->branch_name)
        ->where('room', $request->room)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->first() )
        {
            return back();
        }
        else {
            
            // $date = $request->date;
            // dd($date);
            $currentDay = date('d');
            foreach($request->time as $time) {
                $book = new BookList();
                $book->branch = $request->branch;
                $book->room = $request->room;
                $book->user_id = $user->id;
                $book->name = $user->name;
                $book->date = $request->date;
                $book->time = $time;
                $book->save();
            }
            // $book->time = $request->input('time', []);
            

            $branchroom = BranchRoom::where('branch_name', $request->branch_name)
            ->where('room_type', $request->room);
            return back();
        }
    }
    public function token() {
        if(Auth::check()) {
        $user = User::find(Auth::user()->id);

        return view('booking.token', compact('user'));
        }
       else {
        return back();
       }
    }

    public function buytoken(Request $request) {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            $token = new Token();
            $token->user_id = $user->id;
            $token->name = $user->name;
            $token->bundle = $request->bundle;
            $file = $request->file('img');
            if (!file_exists('images/proof/')) {
                mkdir('images/proof/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/proof/', $fileName);

            // Simpan nama file ke dalam database atau di tempat yang sesuai
            $token->proof = $fileName;
            $token->save();
            return back();
        }
        else
        return back();
    }
}