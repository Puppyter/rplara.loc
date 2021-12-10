<?php

namespace App\Services;

use App\Exceptions\PlayerHttpException;
use App\Repositories\InviteRepository;
use App\Repositories\PlayerRepository;
use App\Repositories\RoomRepository;

class PlayerService
{

    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function createMaster($roomSlug)
    {
        /** @var RoomService $roomService */
        $roomService =app(RoomService::class);
        $room = $roomService->getRoom($roomSlug);
        return $this->playerRepository->create($room->user_id,$room->id,$roomSlug);
    }

    public function create($inviteId)
    {
        /** @var InviteRepository $inviteRepository */
        /** @var RoomRepository  $roomRepository */
        $inviteRepository = app(InviteRepository::class);
        $roomRepository = app(RoomRepository::class);
        $invite = $inviteRepository->get($inviteId);
        $roomId = $roomRepository->getRoom($invite->room_slug)->id;
        if ($roomRepository->getPlayerInRoom($invite->room_slug, $invite->user_id)===null) {
            return $this->playerRepository->create($invite->user_id, $roomId,$invite->room_slug);
        }
        throw new PlayerHttpException('You are already player in this room');
    }

    public function destroy($playerId)
    {
        $this->playerRepository->destroy($playerId);
    }
}
