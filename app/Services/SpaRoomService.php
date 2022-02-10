<?php

namespace App\Services;

use App\Repositories\MetierRepository;
use App\Repositories\PlayerRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\Facades\Storage;

class SpaRoomService
{
    private $roomRepository;
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getData(string $roomSlug, int $userId)
    {
        /** @var PlayerRepository $playerRepository */
        /** @var MetierRepository $metierRepository */
        $metierRepository = app(MetierRepository::class);
        $playerRepository = app(PlayerRepository::class);
        $room = $this->roomRepository->getRoom($roomSlug);
        $player = $playerRepository->find($userId);
        $character = $room->players->where('user_id', $userId)->first()->characters;
        if ($character != null) {
            $character->avatar = Storage::url($character->avatar);
        }
        $metiers = $metierRepository->getAllNames();
        return [
            'room' =>$room,
            'player' => $player,
            'character' => $character,
            'metiers' =>$metiers
            ];
    }
}
