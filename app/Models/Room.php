<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  invites()
    {
        return $this->hasMany(Invite::class);
    }
}
