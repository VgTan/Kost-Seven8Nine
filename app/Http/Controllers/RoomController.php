<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\BranchRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function home() {
        $room = Branch::all();
        return view('welcome', compact('room'));
    }
    
    public function room($site){
        $branch = Branch::where('site', $site)->get();
        
        $loc = Branch::where('site', $site)->first();
        // dd($loc);

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
        $branchloc = Branch::where('site', $site)->first();
        
        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        // dd($schedule);
        return view('booking.roomdetail', compact('rooms','loc','schedule', 'roomname', 'branchloc', 'mon', 'tues', 'wed', 'thur', 'fri'));
    }
}
