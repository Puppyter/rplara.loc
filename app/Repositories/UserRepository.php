<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function store($userData)
    {
        if ($user = User::create($userData)) {
            return $user->id;
        }
        return false;
    }

    public function find($userId)
    {
        return User::find($userId);
    }
    public function findWithRooms($userId)
    {
        $data['user'] = User::find($userId);
        $data['rooms'] = $data['user']->rooms;
        return $data;
    }

    public function findByEmail($email)
    {
        return User::where('email',$email)->first();
    }

    public function update($userId, $updateData)
    {
        if (User::find($userId)->update($updateData))
        {
            return $userId;
        }
        return false;
    }
    public function delete($userId)
    {
       if (User::find($userId)->delete())
       {
           return true;
       }
       return false;
    }
}
