<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMetier extends Model
{
    use HasFactory;

    protected $fillable = [
      'metier_id',
      'room_id'
    ];
}
