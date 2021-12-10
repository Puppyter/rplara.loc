<?php

namespace App\Mail;

use \App\Models\Invite;
use App\Services\InviteService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMailer extends Mailable
{
    use Queueable, SerializesModels;
    protected $invite;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): InviteMailer
    {

        return $this->view('inviteMail')->with(['slug' => $this->invite->room_slug, 'id' => $this->invite->id]);
    }
}
