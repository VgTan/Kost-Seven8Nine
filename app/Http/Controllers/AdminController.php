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
    public function add_schedule(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $cabang = Branch::all();
        $room = Room::all();
        $schedule = Schedule::all();
        
        return view("admin.addschedule", compact("cabang","room","schedule"));
    }

    public function process_schedule(Request $request) {
        $user = User::find(Auth::user()->id);
        if(!Auth::check() || $user->status != 'admin' ) return redirect('/');
        $cabang_id = Branch::where('id', $request->cabang)->first()->id;
        $room_id = Room::where('id', $request->room)->first()->id;
        $roomset = BranchRoom::where('branch_id', $cabang_id)->where('room_id', $room_id)->first()->id;
        
        foreach ($request->time as $selectedTime) {
            $existingScheduleCount = Schedule::where('time', $selectedTime)->count();
        
            if ($existingScheduleCount == 0) {
                $schedule = new Schedule();
                $schedule->branchroom_id = $roomset;
                $schedule->time = $selectedTime;
                $schedule->day = $request->day;
                $schedule->date = $request->date;
                $schedule->save();
            }
        }
        return back();
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
        $token = Token::where('id', $request->id);
        $token->status = "no";
        $token->save();
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
}