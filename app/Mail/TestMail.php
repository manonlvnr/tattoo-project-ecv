<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $flash = [];
    public $user = [];
    public $booking = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($flash, $user, $booking)
    {
        $this->flash = $flash;
        $this->user = $user;
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tattoosite@test.fr')
                    ->subject('Réservation')
                    ->view('emails.test');
    }
}
