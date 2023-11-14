<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Jadwal;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_schedule(Request $request) {
        $cabang = Cabang::all();
        $room = Ruangan::all();
    
        $bassura = Ruangan::where('id_loc', '1')->get();
        $aeon = Ruangan::where('id_loc', '2')->get();
        $maxx = Ruangan::where('id_loc', '3')->get();
        $schedule = Jadwal::all();
        
        return view("admin.addschedule", compact("cabang","room","schedule", "bassura","aeon","maxx"));
    }

    public function process_schedule(Request $request) {
        $cabang = Cabang::where('id', $request->cabang)->first();
        $schedule = new Jadwal();
        $schedule->id_loc = $request->cabang;
        $schedule->id_room = $ 
    }
}
