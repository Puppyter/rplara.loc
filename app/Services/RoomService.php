<?php

namespace App\Services;

use App\Repositories\Interfaces\PlayerInterface;
use App\Repositories\Interfaces\RoomInterface;
use App\Repositories\PlayerRepository;

class RoomService
{
    protected $room;
    public function __construct(RoomInterface $room)
    {
        $this->room = $room;
    }

    public function allRooms()
    {
        return $this->room->getAll();
    }

    public function create($name, $userId)
    {
      return $this->room->create($name, $userId);
    }

    public function update($data)
    {
        return $this->room->edit($data);
    }

    public function delete($roomSlug)
    {
        return $this->room->delete($roomSlug);
    }
    public function getRoom(string $roomSlug)
    {
        return $this->room->getRoom($roomSlug);
    }

    public function getPlayer($roomSlug, $userId)
    {

        return $this->room->getPlayersInRoom($roomSlug)->where('user_id',$userId)->first();
    }

}
