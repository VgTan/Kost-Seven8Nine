<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
    ];
    public function branch()
    {
        return $this->hasOne(BranchRoom::class, 'room_id');
    }
    use HasFactory;
}
