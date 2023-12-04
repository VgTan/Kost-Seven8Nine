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
        $event = Event::orderBy('created_at', 'desc')->take(3)->get();
        $home = TRUE;
        return view('welcome', compact('room', 'event', 'home'));
    }

    public function __construct() {
        $this->middleware(['auth', 'verified']);
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
        $tomorrow = date('F d', strtotime('+1 day'));

        // Calculate the dates for the next 7 days (Monday to Sunday)
        $branchrooms = BranchRoom::all();
        $day = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'];
            $time = ['10.00 - 10.30', '10.30 - 11.00', '11.00 - 11.30',
            '11.30 - 12.00', '12.00 - 12.30', '12.30 - 13.00',
            '13.00 - 13.30', '13.30 - 14.00', '14.00 - 14.30',
            '14.30 - 15.00', '15.00 - 15.30', '15.30 - 16.00', 
            '16.00 - 16.30', '16.30 - 17.00', '17.00 - 17.30',
            '17.30 - 18.00', '18.00 - 18.30', '18.30 - 19.00', 
            '19.00 - 19.30', '19.30 - 20.00', '20.00 - 20.30',
            '20.30 - 21.00'];
            
        if($currentDayNumber == 7) {
            $dates1 = [
            $datemon = date('Y-m-d', strtotime("$currentDate +$daysToMonday days")),
            $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
            $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
            $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
            $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
            $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
            $datesun = date('Y-m-d', strtotime("$datemon +6 days"))
            ];
            $dates2 = [
                $datenextmon = date('Y-m-d', strtotime("$datemon +7 days")),
                $datenexttues = date('Y-m-d', strtotime("$datenextmon +1 days")),
                $datenextwed = date('Y-m-d', strtotime("$datenextmon +2 days")),
                $datenextthur = date('Y-m-d', strtotime("$datenextmon +3 days")),
                $datenextfri = date('Y-m-d', strtotime("$datenextmon +4 days")),
                $datenextsat = date('Y-m-d', strtotime("$datenextmon +5 days")),
                $datenextsun = date('Y-m-d', strtotime("$datenextmon +6 days"))
            ];
        } else {
            $dates1 = [
                $datemon = date('Y-m-d', strtotime("$currentDate - $daysToMonday2 days")),
                $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
                $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
                $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
                $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
                $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
                $datesun = date('Y-m-d', strtotime("$datemon +6 days")),
            ];
            $dates2 = [  
                $datenextmon = date('Y-m-d', strtotime("$currentDate +$daysToMonday days")),
                $datenexttues = date('Y-m-d', strtotime("$datenextmon +1 days")),
                $datenextwed = date('Y-m-d', strtotime("$datenextmon +2 days")),
                $datenextthur = date('Y-m-d', strtotime("$datenextmon +3 days")),
                $datenextfri = date('Y-m-d', strtotime("$datenextmon +4 days")),
                $datenextsat = date('Y-m-d', strtotime("$datenextmon +5 days")),
                $datenextsun = date('Y-m-d', strtotime("$datenextmon +6 days"))
            ];
        }
        if(!Schedule::where('branchroom_id', $rooms->id)->where('date', 'like', '%' . $currentDate . '%')->first()) {
            foreach ($branchrooms as $branchroom) {
                foreach ($day as $index => $days) {
                    foreach ($time as $times) {
                        $existingScheduleWeek1 = Schedule::where('branchroom_id', $branchroom->id)
                            ->where('week', 'week 1')
                            ->where('day', $days)
                            ->where('time', $times)
                            ->first();
            
                        $existingScheduleWeek2 = Schedule::where('branchroom_id', $branchroom->id)
                            ->where('week', 'week 2')
                            ->where('day', $days)
                            ->where('time', $times)
                            ->first();
            
                        // Jika jadwal sudah ada, lakukan pembaruan
                        if ($existingScheduleWeek1) {
                            $existingScheduleWeek1->update([
                                'day' => $days,
                                'date' => $dates1[$index],
                            ]);
                        } else {
                            // Jika jadwal belum ada, buat yang baru
                            $schedule1 = new Schedule();
                            $schedule1->branchroom_id = $branchroom->id;
                            $schedule1->week = 'week 1';
                            $schedule1->day = $days;
                            $schedule1->date = $dates1[$index];
                            $schedule1->time = $times;
                            $schedule1->save();
                        }
            
                        if ($existingScheduleWeek2) {
                            $existingScheduleWeek2->update([
                                'day' => $days,
                                'date' => $dates2[$index],
                            ]);
                        } else {
                            // Jika jadwal belum ada, buat yang baru
                            $schedule2 = new Schedule();
                            $schedule2->branchroom_id = $branchroom->id;
                            $schedule2->week = 'week 2';
                            $schedule2->day = $days;
                            $schedule2->date = $dates2[$index];
                            $schedule2->time = $times;
                            $schedule2->save();
                        }
                    }
                }
            }
        }

        $days = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'];
        for($i = 0; $i < $daysToMonday2+1; $i++) {
            $expired = Schedule::where('day', $days[$i])->where('status', 'ready')->where('date', '<=', $currentDate)->get();
            // dd($expired);
            foreach ($expired as $ex) {
                $ex->update(['status' => 'expired']);
            }
            
        }
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        // dd($mon);
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        $sat = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sat')->get();
        $sun = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sun')->get();
        // dd($schedule);
        return view('booking.roomdetail', compact('tomorrow', 'room', 'rooms','loc','schedule', 'roomname', 'currentDateMD','currentDayNumber', 'branchloc', 'dates1','dates2', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'));
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