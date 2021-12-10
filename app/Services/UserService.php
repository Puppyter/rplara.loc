<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\InviteRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserInformation($userId)
    {
        return $this->userRepository->findWithRooms($userId);
    }

    public function getUserInvites($userId)
    {
        /** @var InviteRepository $inviteRepository */
        $inviteRepository = app(InviteRepository::class);
        return$inviteRepository;

    }
    public function  create($userData)
    {
        $userData['password'] = Hash::make($userData['password']);
        return $this->userRepository->store($userData);
    }
    public function delete($userId)
    {
        return $this->userRepository->delete($userId);
    }
    public function update($userId, $updateData)
    {
        return $this->userRepository->update($userId,$updateData);
    }
}
