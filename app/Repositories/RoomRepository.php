<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Interfaces\RoomInterface;

class RoomRepository implements RoomInterface
{

    public function getAll()
    {
        return Room::paginate(10);
    }

    public function getRoom($roomSlug)
    {
        return Room::where('slug', $roomSlug)->first();
    }



    public function edit($data)
    {
        return Room::where('slug', $data['slug'])->update($data)
            ?$data['slug']
            :null;
    }

    public function delete($roomSlug)
    {
        return Room::where('slug', $roomSlug)->delete();
    }

    public function create($name,$userId)
    {
        return Room::create(['name'=>$name,'user_id'=>$userId]);
    }

    public function getPlayersInRoom($roomSlug)
    {
        return $this->getRoom($roomSlug)->players;
    }

    public function getPlayerInRoom($roomSlug,$userId)
    {
        return $this->getPlayersInRoom($roomSlug)->where('user_id', $userId)->first();
    }
}
