<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Jadwal;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function room($site){
        $loc = Cabang::where('site', $site)->first();
        // dd($id_loc);
        $rooms = Ruangan::where('id_loc', $loc->id)->get();
        // dd($rooms);
        return view("booking.book", compact("rooms", "loc"));
    }

    public function room_details($site, $room){
        $loc = Cabang::where('site', $site)->first();
        // dd($loc);
        $rooms = Ruangan::where('id_loc', $loc->id)->where('room', $room)->get();
        dd($rooms);
        $schedule = Jadwal::where('id_loc', $loc->id)->where('id_room', $rooms->id_room)->first();
        dd($schedule);
        return view('booking.room', compact('rooms','loc'));
    }
}
