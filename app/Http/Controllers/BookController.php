<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\BranchRoom;
use App\Models\User;
use App\Models\Branch;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function page($site, $room){
        $loc = Branch::where('site', $site)->first();
        // dd($loc);

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        $branchloc = Branch::where('site', $site)->first();
        
        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        
        return view('booking.book', compact('rooms','loc','schedule', 'roomname', 'branchloc', 'mon', 'tues', 'wed', 'thur', 'fri'));
    }

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