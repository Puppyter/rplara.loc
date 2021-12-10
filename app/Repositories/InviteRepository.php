<?php

namespace App\Repositories;

use App\Models\Invite;

class InviteRepository
{
    public function create($invitorId, $userId, $roomSlug, $dateExist)
    {
        return Invite::create(
            [
                'inviter_id' => $invitorId,
                'user_id' => $userId,
                'room_slug' => $roomSlug,
                'date_exist' => $dateExist
            ]
        );
    }

    public function findForUsers($userId)
    {
        return Invite::where('user_id', $userId)->get();
    }

    public function get($inviteId)
    {
        return Invite::where('id', $inviteId)->first();
    }

    public function destroy($inviteId)
    {
        return Invite::where('id', $inviteId)->delete();
    }
}
