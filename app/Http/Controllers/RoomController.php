<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\BranchRoom;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function home() {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->status == 'admin') return redirect()->route('dashboard');   
        }
        $room = Branch::all();
        $event = Event::all();
        $home = TRUE;
        return view('welcome', compact('room', 'event', 'home'));
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
        if(!$loc) return back();

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        $branchloc = Branch::where('site', $site)->first();
        
        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();

        $currentDayNumber = date('N');

        // Calculate the number of days to Monday (the beginning of the week)
        $daysToMonday = (8 - $currentDayNumber) % 7;
        $daysToMonday2 = 7-((8 - $currentDayNumber) % 7);
        // dd($daysToMonday);
        // Get the current date
        $currentDate = date('Y-m-d');
        $currentDateMD = date('F d');

        // Calculate the dates for the next 7 days (Monday to Sunday)
        if($currentDate == 7) {
            $days = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'];
            for($i = 0; $i < 7; $i++) {
                $expired = Schedule::where('day', $days[$i])->get();
                foreach ($expired as $ex) {
                    $ex->update(['status' => 'ready']);
                }
            }
            $dates = [
            $datemon = date('Y-m-d', strtotime("$currentDate +$daysToMonday days")),
            $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
            $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
            $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
            $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
            $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
            $datesun = date('Y-m-d', strtotime("$datemon +6 days"))
            ];
        } else {
            $dates = [
                $datemon = date('Y-m-d', strtotime("$currentDate -$daysToMonday2 days")),
                $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
                $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
                $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
                $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
                $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
                $datesun = date('Y-m-d', strtotime("$datemon +6 days"))
            ];
        }
        $days = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'];
        for($i = 0; $i < $daysToMonday2+1; $i++) {
            $expired = Schedule::where('day', $days[$i])->get();
            foreach ($expired as $ex) {
                $ex->update(['status' => 'booked']);
            }
        }
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        $sat = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sat')->get();
        $sun = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sun')->get();
        // dd($schedule);
        return view('booking.roomdetail', compact('room', 'rooms','loc','schedule', 'roomname', 'currentDateMD', 'branchloc', 'dates', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'));
    }

    public function findroom($room, Request $request) {
        $val = $request->validate([
            'room' => 'required'
        ]);
        if($val) {
            $branchroom = BranchRoom::where('room_type', 'like', '%' . $request->room . '%')
            ->orWhere('branch_name', 'like', '%' . $request->room . '%')->get();
            return view('page.findroom', compact('branchroom', 'request'));
        }

    }
}