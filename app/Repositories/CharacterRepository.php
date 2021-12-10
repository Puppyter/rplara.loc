<?php

namespace App\Repositories;

use App\Models\Character;

class CharacterRepository
{
    public function create($data)
    {
       return Character::create($data);
    }

    public function update($data)
    {
        return Character::update($data);
    }

    public function delete($characterId)
    {
       return Character::find($characterId)->delete();
    }

    public function get($characterId)
    {
        return Character::find($characterId);
    }

}
