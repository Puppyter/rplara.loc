<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;
    protected $fillable= [
      'name',
      'strength',
      'dexterity',
      'constitution',
      'intellect',
      'wisdom',
      'charisma'
    ];
}
