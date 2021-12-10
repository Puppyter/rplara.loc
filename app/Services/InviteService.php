<?php

namespace App\Services;

use App\Exceptions\InviteHttpException;
use App\Mail\InviteMailer;
use App\Mail\PleaseMail;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\InviteRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Exception;

class InviteService
{
    private $roomRepository;
    private $inviteRepository;
    private $userRepository;
    public function __construct(InviteRepository $inviteRepository, RoomRepository $roomRepository)
    {

        $this->roomRepository = $roomRepository;
        $this->inviteRepository = $inviteRepository;
    }

    public function createInvite($invitorId,$userId,$roomSlug)
    {
        $dateExist = date('Y-m-d', strtotime('+1 day'));
        return $this->inviteRepository->create($invitorId,$userId,$roomSlug, $dateExist);
    }

    public function sendInvite($roomSlug, $userEmail): bool
    {
        /** @var UserRepositoryInterface $userRepository */
        $userRepository = app(UserRepositoryInterface::class);
        $invitorId = $this->roomRepository->getRoom($roomSlug)->user_id;
        $user = $userRepository->findByEmail($userEmail);
        if ($user == null)
        {
            throw new InviteHttpException("Can't find user");
        }
        $invite = $this->createInvite($invitorId,$user->id,$roomSlug);
        Mail::to($userEmail)->send(new InviteMailer($invite));
        return true;
    }

    public function sendPleaseInvite($roomSlug,$userId)
    {
        /** @var UserRepositoryInterface $userRepository */
        $userRepository = app(UserRepositoryInterface::class);
        $invitorId = $this->roomRepository->getRoom($roomSlug)->user_id;
        $invitor = $userRepository->find($invitorId);
        $invite = $this->createInvite($invitorId,$userId,$roomSlug);
        if ($invite ===false)
        {
            return false;
        }
        Mail::to($invitor->email)->send(new PleaseMail($invite));
        return true;
    }

    public function destroy($inviteId)
    {
        return $this->inviteRepository->destroy($inviteId);
    }

}
