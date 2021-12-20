<?php

namespace App\Services;

use App\Repositories\MetierRepository;
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
        /** @var MetierRepository $metierRepository */
        $metierRepository = app(MetierRepository::class);
        $playerRepository = app(PlayerRepository::class);
        $room = $this->roomRepository->getRoom($roomSlug);
        $player = $playerRepository->find($playerId);
        $character = $player->character;
        $metiers = $metierRepository->getAllNames();
        return [
            'room' =>$room,
            'player' => $player,
            'character' => $character,
            'metiers' =>$metiers
            ];
    }
}
