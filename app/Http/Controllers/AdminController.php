<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\BranchRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user() {
        $user = User::find(Auth::user()->id);
    if(!Auth::check() ||$user->status != 'admin' ) return redirect('/');
        $user = User::all();
        $branch = Branch::all();
        $branchroom = BranchRoom::all();
        return view("admin.user", compact('user', 'branch', 'branchroom'));
    }
    public function add_cabang(Request $request) {
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

    public function rooms() {
        $branch = Branch::all();
        return view('admin.add_room', compact('branch'));
    }
    public function add_room(Request $request) {
        // dd($request->name);
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
                mkdir('images/cabang/', 0777, true);
            }
            $fileName = $file->getClientOriginalName();
            $file->move('images/cabang/', $fileName);
            $room->img = $fileName;
        }
        if(!BranchRoom::where('branch_id', $request->branch_id)->where('room_id', $room_id)->first()){
            // $anu = BranchRoom::where('branch_id', $request->branch_id)->where('room_id', $room_id)->first();
            // dd($anu);
            $branchname = Branch::where('id', $request->branch_id)->first();
            $room->branch_id = $request->branch_id;
            $room->room_id = $room_id;
            $room->room_type = $request->name;
            $room->branch_name = $branchname->name;
            $room->room_size = $request->size;
            $room->room_equipment = $request->equipment;
            $room->room_desc = $request->desc;
            
            $room->save();
        }
        return back();
    }
    public function add_schedule(Request $request) {
        $cabang = Branch::all();
        $room = Room::all();
        $schedule = Schedule::all();
        
        return view("admin.addschedule", compact("cabang","room","schedule"));
    }

    public function process_schedule(Request $request) {
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
}