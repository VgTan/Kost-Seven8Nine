<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\BranchRoom;
use App\Models\Token;
use App\Models\User;
use App\Models\Branch;
use App\Models\Room;
use App\Models\Schedule;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function page($site, $room){
        if(!Auth::check()) return redirect('/login');
        $user = User::find(Auth::user()->id);

        $loc = Branch::where('site', $site)->first();
        // dd($loc);

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        $branchloc = Branch::where('site', $site)->first();
        $currentDayNumber = date('N');
        // Calculate the number of days to Monday (the beginning of the week)
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

        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        $sat = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sat')->get();
        $sun = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sun')->get();
        return view('booking.book', compact('rooms', 'loc', 'schedule', 'roomname', 'currentDateYM', 'branchloc', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun', 'user', 'datemon', 'datetues', 'datewed', 'datethur', 'datefri', 'datesat', 'datesun', 'datenextmon', 'datenexttues', 'datenextwed', 'datenextthur', 'datenextfri', 'datenextsat', 'datenextsun', 'dates1', 'dates2'));
    }

    public function book(Request $request) {
        $token = count($request->time);
        // dd($token);
        if(!Auth::check()) return redirect('/login');
        $currentDayNumber = date('N');
        $currentDate = date('d');
        // dd($request->all());
        // $nau = BookList::where('branch', $request->branch_name)
        // ->where('room', $request->room)
        // ->where('date', $request->date)
        // ->where('time', $request->time)->first();
        // dd($nau);
        // dd($request->all());
        $user = User::find(Auth::user()->id);
        $i = 0;
        $j = 0;
        foreach($request->time as $times) {
            list($day, $date, $time) = explode(' ', $times, 3);
            $isBooked = BookList::where('branch', $request->branchname)
            ->where('room', $request->roomname)
            ->where('date', $date)
            ->where('time', $time)
            ->first();
            // dd($isBooked);
            // dd($request->all());
            if($isBooked) 
            {
                $branch = Branch::where('name', $request->branchname)->first();
                // dd($branch->all());
                $room = Room::where('name', $request->roomname)->first();
                return redirect(url("{$branch->site}/{$room->id}/book"))
                ->with('message', 'List Already Booked');
            }
            else {        
                // $date = $request->date;
                // dd($date);
                // $currentDay = date('l'); // Returns the full name of the current day (e.g., Monday)
                // Get the current day number (1 for Monday, 2 for Tuesday, ..., 7 for Sunday)
                // dd($token);
                if($user->token < $token)
                {
                    return redirect('/token');
                }
                else {
                    if(!$isBooked) {
                        $user->token = $user->token - $token; 
                        foreach($request->time as $times) {
                            $user->save();
                            list($day, $date, $time) = explode(' ', $times, 3);
                            $book = new BookList();
                            $book->branch = $request->branchname;
                            $book->room = $request->roomname;
                            $book->user_id = $user->id;
                            $book->name = $user->name;
                            $book->date = $date;
                            $book->time = $time;
                            $book->save();
                            
                            $branchroom = BranchRoom::where('branch_name', $request->branchname)
                            ->where('room_type', $request->roomname)->first();
                            // dd($request->room);
                            $schedule = Schedule::where('branchroom_id', $branchroom->id)
                            ->where('day', $day)
                            ->where('date', $date)
                            ->where('time', $time)
                            ->first();
                            // dd($schedule);
                            $schedule->status = "booked";
                            $schedule->save();
                        }
                        // $book->time = $request->input('time', []);
                            $branchroom = BranchRoom::where('branch_name', $request->branchname)
                            ->where('room_type', $request->roomname);
                            $branch = Branch::where('name', $request->branchname)->first();
                            // dd($branch->all());
                            $room = Room::where('name', $request->roomname)->first();
                            return redirect(url("{$branch->site}/{$room->id}/book"))
                            ->with('message', 'List Already Booked');
                        }
                }
            }
        }
    }


    public function book_details(Request $request) {
        if(!Auth::check()) return redirect('/login');
        $book = new BookList();
        $user = User::find(Auth::user()->id);
        dd($request->all());

        if(BookList::where('branch', $request->branch_name)
        ->where('room', $request->room)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->first() )
        {
            return back();
        }
        else {
                $branchroom = BranchRoom::where('branch_name', $request->branch_name)
                ->where('room_type', $request->room);
                $branchname = $request->branch;
                $roomname = $request->room;
                $room = BranchRoom::where('branch_name', $branchname)
                ->where('room_type', $roomname)->first();
                $roomimg = $room->img;
                $time = $request->time;
                $token = count($request->time);
                return view('booking.bookdetails', compact('branchname', 'roomname', 'time', 'roomimg', 'token'));
        }
    }
    public function token() {
        if(Auth::check()) {
        $user = User::find(Auth::user()->id);

        return view('booking.token', compact('user'));
        }
       else {
        return redirect('/login');
       }
    }

    public $total_token;
    public function buytoken(Request $request) {
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            $paidToken = Token::where('user_id', $user->id)
            ->where('bundle', $request->bundle)
            ->where('status', 'Paid')
            ->first();
            $existingToken = Token::where('user_id', $user->id)
            ->where('bundle', $request->bundle)
            ->where('status', 'Unpaid')
            ->first();

            if(!$existingToken) {
                    $token = new Token();
                    $token->user_id = $user->id;
                    $token->name = $user->name;
                    $token->bundle = $request->bundle;
                    switch($token->bundle) {
                        case 'basic1':
                            $token->price = 75000;
                            $total_token = 1;
                            break;
                        case 'basic2':
                            $token->price = 150000;
                            $total_token = 2;
                            break;
                        case 'basic3':
                            $token->price = 450000;
                            $total_token = 6;
                            break;
                        case 'flexi1':
                            $token->price = 280000;
                            $total_token = 4;
                            break;
                        case 'flexi2':
                            $token->price = 1200000;
                            $total_token = 20;
                            break;
                        case 'flexi3':
                            $token->price = 2000000;
                            $total_token = 40;
                            break;
                        case 'flexi4':
                            $token->price = 4000000;
                            $total_token = 100;
                            break;
                        }
                        $token->proof = '-';
                        // $token->status = 'Unpaid';
                        $token->save();
                    
                return view('booking.checkout', compact('token', 'total_token', 'existingToken', 'paidToken'));
            }
            else {
                $token = $existingToken;
                switch($token->bundle) {
                    case 'basic1':
                        $token->price = 75000;
                        $total_token = 1;
                        break;
                    case 'basic2':
                        $token->price = 150000;
                        $total_token = 2;
                        break;
                    case 'basic3':
                        $token->price = 450000;
                        $total_token = 6;
                        break;
                    case 'flexi1':
                        $token->price = 280000;
                        $total_token = 4;
                        break;
                    case 'flexi2':
                        $token->price = 1200000;
                        $total_token = 20;
                        break;
                    case 'flexi3':
                        $token->price = 2000000;
                        $total_token = 40;
                        break;
                    case 'flexi4':
                        $token->price = 4000000;
                        $total_token = 100;
                        break;
                }
                return view('booking.checkout', compact('token', 'total_token', 'existingToken', 'paidToken'));                
            }
        }
    }

    // public function checkout_token() {
    //     return view('booking.checkout');
    // }

    public function callback(Request $request) {
        $token = Token::where('id', $request->order_id)->first();
        $user = User::find(Auth::user()->id);
        $file = $request->file('img');
        // dd($file);
        if(!file_exists('images/proof/')) {
            mkdir('images/proof/', 0777, true);
        }
        $fileName = $file->getClientOriginalName();
        $file->move('images/proof/', $fileName);
        // dd($fileName);        
    
        $token->proof = $fileName;
        $token->status = 'Pending';        
        $token->save();
        
        $user->save();
        return redirect('/token');
    }
}