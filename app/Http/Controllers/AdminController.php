<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\BranchRoom;
use App\Models\Token;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminController extends Controller
{
    public function user() {
        if(!Auth::check()) return redirect('/');
        $user = User::find(Auth::user()->id);
        if($user->status != 'admin' ) return redirect('/');
        $user = User::all();
        $branch = Branch::all();
        $branchroom = BranchRoom::all();
        return view("admin.user", compact('user', 'branch', 'branchroom'));
    }

    public function branch() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        return view('admin.add_cabang');
    }

    public function add_cabang(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $cabang = new Branch();
        $cabang->name = $request->name;
        $cabang->site = $request->site;
        $cabang->location = $request->location;
        if ($request->img) {
            $file = $request->file('img');
        
            if (!file_exists('images/cabang/')) {
                mkdir('images/cabang/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/cabang/', $fileName);

            // Simpan nama file ke dalam database atau di tempat yang sesuai
            $cabang->img = $fileName;
        }
        $cabang->save();
        return back();
    }

    public function event() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        return view('admin.add_event');
    }

    public function add_event(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        
        $event = new Event();
        $event->name = $request->name;
        $event->desc = $request->desc;
        $event->location = $request->location;
        $event->date = $request->date;
        if ($request->img) {
            $file = $request->file('img');
        
            if (!file_exists('images/events/')) {
                mkdir('images/events/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/events/', $fileName);

            // Simpan nama file ke dalam database atau di tempat yang sesuai
            $event->img = $fileName;
        }
        $event->link = $request->link;
        $event->save();
        return back();
    }

    public function rooms() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $branch = Branch::all();
        return view('admin.add_room', compact('branch'));
    }

    public function add_room(Request $request) {
        // dd($request->name);
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $room_name = new Room();
        $room_name->name = $request->name;
        if(!Room::where('name', $request->name)->first()) {
            $room_name->save();
            $room_id = $room_name->id;
        }
        else {  
            $room_id = Room::where('name', $request->name)->first()->id;
        }
        $room = new BranchRoom();
        if ($request->img) {
            $file = $request->file('img');
        
            if (!file_exists('images/cabang/')) {
                mkdir('images/rooms/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/rooms/', $fileName);
            $room->img = $fileName;
        }
        if(!BranchRoom::where('branch_id', $request->branch_id)->where('room_id', $room_id)->first()){
            $branchname = Branch::where('id', $request->branch_id)->first();
            $schedule = new Schedule();
            $room->branch_id = $request->branch_id;
            $room->room_id = $room_id;
            $room->room_type = $request->name;
            $room->branch_name = $branchname->name;
            $room->room_size = $request->size;
            $room->room_equipment = $request->equipment;
            $room->room_desc = $request->desc;
            $room->save();
            
            $branchroom = BranchRoom::where('branch_id', $request->branch_id)->where('room_id', $room_id)->first();
            $day = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'];
            $time = ['10.00 - 10.30', '10.30 - 11.00', '11.00 - 11.30',
            '11.30 - 12.00', '12.00 - 12.30', '12.30 - 13.00',
            '13.00 - 13.30', '13.30 - 14.00', '14.00 - 14.30',
            '14.30 - 15.00', '15.00 - 15.30', '15.30 - 16.00', 
            '16.00 - 16.30', '16.30 - 17.00', '17.00 - 17.30',
            '17.30 - 18.00', '18.00 - 18.30', '18.30 - 19.00', 
            '19.00 - 19.30', '19.30 - 20.00', '20.00 - 20.30',
            '20.30 - 21.00'];
            foreach ($day as $days) {
                foreach ($time as $times) {
                    $schedule = new Schedule();
                    $schedule->branchroom_id = $branchroom->id;
                    $schedule->day = $days;
                    $schedule->date = '-';
                    $schedule->time = $times;
                    // dd($schedule);
                    $schedule->save();
                }
            }
            
        }
        return back();
    }

    public function add_schedule() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');

        $cabang = BranchRoom::all();
        $room = Room::all();
        $schedule = TRUE;
        
        return view('admin.addschedule', compact('cabang', 'room', 'schedule'));
    }

    public function edit_schedule($site, $room) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        
        $loc = Branch::where('site', $site)->first();
        // dd($loc);

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        $branchloc = Branch::where('site', $site)->first();
        $currentDayNumber = date('N');

        $daysToMonday = (8 - $currentDayNumber) % 7;
        $daysToMonday2 = 7-((8 - $currentDayNumber) % 7);
        // dd($daysToMonday);
        // Get the current date
        $currentDate = date('Y-m-d');
        $currentDateYM = date('F Y');

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
                $datemon = date('Y-m-d', strtotime("$currentDate + $daysToMonday days")),
                $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
                $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
                $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
                $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
                $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
                $datesun = date('Y-m-d', strtotime("$datemon +6 days")),
            ];
            $dates2 = [  
                $datenextmon = date('Y-m-d', strtotime("$currentDate +$daysToMonday2 days")),
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
            
                        if ($existingScheduleWeek1) {
                            $existingScheduleWeek1->update([
                                'day' => $days,
                                'date' => $dates1[$index],
                            ]);
                        } else {
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

        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        $sat = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sat')->get();
        $sun = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sun')->get();
        return view('admin.editschedule', compact('rooms', 'user', 'loc', 'schedule', 'roomname', 'currentDateYM', 'branchloc', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun', 
        'datemon', 'datetues', 'datewed', 'datethur', 'datefri', 'datesat', 'datesun', 'dates1'));
    }

    public function check_trans() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $user = User::all();
        $token = Token::all();
        return view("admin.transaction", compact('user', 'token'));
    }

    public function remove(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $user = Token::where('id', $request->id)->forceDelete();
        return back();
    }

    public function accept(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        
        $token = Token::where('id', $request->id)->first();
        $user = User::where('id', $token->user_id)->first();
        // dd($request->id);
        $user_token = $user->token;
        switch($token->bundle) {
            case 'basic1':
                $user->token = $user_token + 1;
                break;
            case 'basic2':
                $user->token = $user_token + 2;
                break;
            case 'basic3':
                $user->token = $user_token + 6;
                break;
            case 'flexi1':
                $user->token = $user_token + 4;
                break;
            case 'flexi2':
                $user->token = $user_token + 20;
                break;
            case 'flexi3':
                $user->token = $user_token + 40;
                break;
            case 'flexi4':
                $user->token = $user_token + 100;
                break;
        }
        $user->save();
        
        $token->status = "Paid";
        $token->save();
        return back();
    }

    public function book_list() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
    
        $user = User::all();
        $book = BookList::all();
        $branches = Branch::all();

        $branchBooks = [];

        foreach ($branches as $branch) {
            $branchBooks[$branch->id] = BookList::where('branch', $branch->name)->get();
            // dd($branchBooks[$branch->id]);
            $branchBooks[$branch->id]->branch = $branch->name;
        }

        return view("admin.booklist", compact('user', 'book', 'branchBooks', 'branches'));
    }

    public function done(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $booklist = BookList::where('id', $request->id)->first();
        // dd($request->id);
        $booklist->status = "done";
        $booklist->save();
        return back();
    }

    public function contactus() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        
        $contact = Contact::all();
        return view('admin.admin_contactus', compact('contact'));
    }

    public function trans_log() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $user = User::all();
        $token = Token::all();

        return view('admin.transactionlog', compact('user', 'token'));
    }

    public function book_log() {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
    
        $user = User::all();
        $book = BookList::all();
        $branches = Branch::all();

        $branchBooks = [];

        foreach ($branches as $branch) {
            $branchBooks[$branch->id] = BookList::where('branch', $branch->name)->get();
            // dd($branchBooks[$branch->id]);
            $branchBooks[$branch->id]->branch = $branch->name;
        }
        return view('admin.booklog', compact('user', 'book', 'branchBooks', 'branches'));
    }
}