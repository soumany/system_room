<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $room;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($room, $user)
    {
        $this->room = $room;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Room Booking Request')
                    ->view('email.booking')
                    ->with([
                        'room' => $this->room,
                        'user' => $this->user,
                    ]);
    }
}
