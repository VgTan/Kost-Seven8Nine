<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchRoom extends Model
{
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'branch_rooms', 'branch_id', 'room_id');
    }
    use HasFactory;
}
