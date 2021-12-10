<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'user_id',
        'character_id',
        'room_slug'
    ];

    public function characters()
    {
        return $this->hasOne(Character::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
