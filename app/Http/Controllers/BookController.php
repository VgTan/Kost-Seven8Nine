<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\BranchRoom;
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
}