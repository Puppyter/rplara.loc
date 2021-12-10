<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'race',
        'metier_name',
        'health',
        'name',
        'class',
        'strength',
        'dexterity',
        'constitution',
        'intellect',
        'wisdom',
        'charisma',
        'avatar'
    ];

    public function player()
    {
        return $this->hasOne(Player::class);
    }
}
