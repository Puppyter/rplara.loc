<?php

namespace App\Services;

use App\Exceptions\InviteHttpException;
use App\Exceptions\PlayerHttpException;
use App\Repositories\CharacterRepository;
use App\Repositories\MetierRepository;
use App\Repositories\PlayerRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\Facades\Auth;

class CharacterService
{
    private $hp = 0;
    private $characterRepository;
    public function __construct(CharacterRepository $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }

    public function checkAttributes(array $attributes)
    {
        switch ($res = array_sum($attributes)) {
            case $res<48:
                throw new InviteHttpException('Not all points are allocated');
            case $res>48:
                throw new InviteHttpException('You character so strong');
            default:
                return true;
        }
    }

    public function delete($characterId)
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = app(PlayerRepository::class);
        $character = $this->characterRepository->get($characterId);
        $playerRepository->update($character->player->id,['character_id'=>0]);
        return $this->characterRepository->delete($characterId);
    }

    public function update(array $data): bool
    {
        return $this->characterRepository->update($data);
    }

    public function generateHP(int $constitution, int $level)
    {
        if ($level > 1)
        {
            for ($i=2; $i<=$level; $i++)
            {
                $this->hp = $this->hp + rand(0,10);
            }
        }
        return $this->hp + $constitution;
    }

    public function get(int $characterId)
    {
       return $this->characterRepository->get($characterId);
    }

    public function getMetierAttributes(string $metierName)
    {
        /** @var MetierRepository $metierRepository */
        $metierRepository = app(MetierRepository::class);
        return $metierRepository->getAttributesByName($metierName);
    }

    /**
     * @throws PlayerHttpException
     */
    public function checkCharacterInPlayer(int $playerId): bool
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = app(PlayerRepository::class);
        $player = $playerRepository->find($playerId);
        if ($player->character_id==0) {
            return true;
        }
       throw new PlayerHttpException('You are already have character in this room');
    }

    public function getRoomStartLevel(int $playerId)
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = app(PlayerRepository::class);
        $player = $playerRepository->find($playerId);
        return $player->room->start_level;
    }

    public function create(array $data)
    {
        /** @var PlayerRepository $playerRepository */
        $playerRepository = app(PlayerRepository::class);
        $player = $playerRepository->find($data['player_id']);
        $character = $this->characterRepository->create($data);
        $playerRepository->update($player->id,['character_id'=>$character->id]);
        return $character;

    }
}
