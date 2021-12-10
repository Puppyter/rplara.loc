<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function store($userData);
    public function findWithRooms($userId);
    public function update($userId, $updateData);
    public function delete($userId);
    public function findByEmail($email);
}
