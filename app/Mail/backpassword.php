<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class backpassword extends Mailable
{
    use Queueable, SerializesModels;

    public $users;


    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function build()
    {
         return $this->subject('Change password')
                    ->view('authentification.messagebackpassword');
    }
}
