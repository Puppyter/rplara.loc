<?php

namespace App\Repositories;

use App\Models\Player;

class PlayerRepository
{
    public function create($userId, $roomId,$room_slug)
    {
        return Player::create([
            'user_id' => $userId,
            'room_id' => $roomId,
            'room_slug' => $room_slug
        ]);
    }

    public function update($playerId, $data)
    {
        return Player::find($playerId)->update($data);
    }

    public function find($playerId)
    {
        return Player::find($playerId);
    }

    public function hasUser($userId)
    {
       return Player::where('user_id',$userId)->get();
    }

    public function destroy($playerId)
    {
        return Player::where('id', $playerId)->delete();
    }

}
