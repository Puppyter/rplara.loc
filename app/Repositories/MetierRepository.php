<?php

namespace App\Repositories;

use App\Models\Metier;

class MetierRepository
{
    public function getAttributesByName($name)
    {
        return Metier::where('name', $name)->first();
    }

    public function create($data)
    {
        return Metier::create($data);
    }

    public function getAllNames()
    {
        return Metier::pluck('name');
    }
}
