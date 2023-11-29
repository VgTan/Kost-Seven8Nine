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
        $loc = Branch::where('site', $site)->first();
        // dd($loc);

        $rooms = BranchRoom::where('branch_id', $loc->id)->where('room_id', $room)->first();
        $roomname = Room::where('id', $room)->first()->name;
        $branchloc = Branch::where('site', $site)->first();
        $currentDayNumber = date('N');

        // Calculate the number of days to Monday (the beginning of the week)
        $daysToMonday = (8 - $currentDayNumber) % 7;

        // Get the current date
        $currentDate = date('Y-m-d');
        $currentDateYM = date('F Y');

        // Calculate the dates for the next 7 days (Monday to Sunday)
        $dates = [
        $datemon = date('Y-m-d', strtotime("$currentDate +$daysToMonday days")),
        $datetues = date('Y-m-d', strtotime("$datemon +1 days")),
        $datewed = date('Y-m-d', strtotime("$datemon +2 days")),
        $datethur = date('Y-m-d', strtotime("$datemon +3 days")),
        $datefri = date('Y-m-d', strtotime("$datemon +4 days")),
        $datesat = date('Y-m-d', strtotime("$datemon +5 days")),
        $datesun = date('Y-m-d', strtotime("$datemon +6 days"))
        ];

        // dd($rooms);
        $schedule = Schedule::where('branchroom_id', $rooms->id)->get();
        $mon = Schedule::where('branchroom_id', $rooms->id)->where('day', 'mon')->get();
        $tues = Schedule::where('branchroom_id', $rooms->id)->where('day', 'tues')->get();
        $wed = Schedule::where('branchroom_id', $rooms->id)->where('day', 'wed')->get();
        $thur = Schedule::where('branchroom_id', $rooms->id)->where('day', 'thur')->get();
        $fri = Schedule::where('branchroom_id', $rooms->id)->where('day', 'fri')->get();
        $sat = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sat')->get();
        $sun = Schedule::where('branchroom_id', $rooms->id)->where('day', 'sun')->get();
        return view('booking.book', compact('rooms', 'loc', 'schedule', 'roomname', 'currentDateYM', 'branchloc', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun', 
        'datemon', 'datetues', 'datewed', 'datethur', 'datefri', 'datesat', 'datesun', 'dates'));
    }

    public function book(Request $request) {
        if(!Auth::check()) return redirect('/login');

        $currentDayNumber = date('N');
        $currentDate = date('d');
        $book = new BookList();
        // dd($request);
        // $nau = BookList::where('branch', $request->branch_name)
        // ->where('room', $request->room)
        // ->where('date', $request->date)
        // ->where('time', $request->time)->first();
        // dd($nau);
        $user = User::find(Auth::user()->id);
        $i = 0;
        foreach($request->time as $times) {
            list($day, $date, $time) = explode(' ', $times, 3);
            $isBooked[$i] = BookList::where('branch', $request->branch)
            ->where('room', $request->room)
            ->where('date', $date)
            ->where('time', $time)
            ->first();
            // dd($isBooked);
            // dd($request->all());
            $i++;
        };
        foreach($isBooked as $isBooked) {
            if($isBooked) 
            {
                $branch = Branch::where('name', $request->branch)->first();
                // dd($branch->all());
                $room = Room::where('name', $request->room)->first();
                return redirect(url("{$branch->site}/{$room->id}/book"))
                ->with('message', 'List Already Booked');
            }
            else {        
                // $date = $request->date;
                // dd($date);
                // $currentDay = date('l'); // Returns the full name of the current day (e.g., Monday)
                // Get the current day number (1 for Monday, 2 for Tuesday, ..., 7 for Sunday)
                $token = count($request->time);
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
                            // $book->day = $request->day;
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
                            ->where('time', $time)
                            ->first();
                            $schedule->status = "booked";
                            $schedule->save();
                        }
                        // $book->time = $request->input('time', []);
                            $branchroom = BranchRoom::where('branch_name', $request->branch_name)
                            ->where('room_type', $request->room);
                            return back()->with('message', 'hahahaha');
                        }
                }
            }
        }
    }


    public function book_details(Request $request) {
        if(!Auth::check()) return redirect('/login');
        $book = new BookList();
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
            // $this->validate($request->all);
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
            $file = $request->file('img');
            if (!file_exists('images/proof/')) {
                mkdir('images/proof/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/proof/', $fileName);

            // Simpan nama file ke dalam database atau di tempat yang sesuai
            $token->proof = $fileName;
            $token->save();
          
            //SAMPLE REQUEST START HERE

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key'); // Corrected key name
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $token->id,
                    'gross_amount' => $token->price,
                ),
                'customer_details' => array(
                    'user_id' => $token->user_id,
                    'first_name' => $token->name,
                    'last_name' => '',
                    'email' => $user->email
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
           

            // dd($snapToken);
        }
        return view('booking.checkout', compact('token', 'snapToken', 'total_token'));
    }

    public function checkout_token() {
        return view('booking.checkout');
    }

    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture') {
                $token = Token::where('id', $request->order_id)->first();
                $user = User::where('id', $token->user_id)->first();
                $token->update(['status' => 'Paid']);
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
            }
        }
    }
}