<?php

namespace App\Services;

use App\Repositories\PlayerRepository;
use App\Repositories\RoomRepository;

class SpaRoomService
{
    private $roomRepository;
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getData(string $roomSlug, int $playerId)
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = app(PlayerRepository::class);
        $room = $this->roomRepository->getRoom($roomSlug);
        $player = $playerRepository->find($playerId);
        $character = $player->character;
        return [
            'room' =>$room,
            'player' => $player,
            'character' => $character
            ];
    }
}
