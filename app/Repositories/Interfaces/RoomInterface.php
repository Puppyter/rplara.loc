<?php

namespace App\Repositories\Interfaces;

interface RoomInterface
{
    public function getAll();
    public function getRoom($roomSlug);
    public function edit($data);
    public function delete($roomSlug);
    public function create($name,$userId);
    public function getPlayersInRoom($roomSlug);
    public function getPlayerInRoom($roomSlug, $userId);
}
