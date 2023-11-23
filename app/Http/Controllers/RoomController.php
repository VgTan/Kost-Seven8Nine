<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\BranchRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function home() {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->status == 'admin') return redirect()->route('dashboard');   
        }
        $room = Branch::all();
        return view('welcome', compact('room'));
    }
    
    public function room($site){
        $branch = Branch::where('site', $site)->get();
        // dd($loc);
        $loc = Branch::where('site', $site)->first();

        $rooms = BranchRoom::where('branch_id', $loc->id)->get();
        // dd($rooms);
        $roomnames = Room::all();
        // $roomnames = RoomName::where('id', $rooms->pluck('id_room'))->get();
        return view("booking.room", compact("rooms", "branch", "loc", "roomnames"));
    }

    public function room_details($site, $room){
        $loc = Branch::where('site', $site)->first();
        // dd($loc);

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        // dd($schedule);
        return view('booking.book', compact('rooms','loc','schedule', 'roomname', 'mon', 'tues', 'wed', 'thur', 'fri'));
    }
}