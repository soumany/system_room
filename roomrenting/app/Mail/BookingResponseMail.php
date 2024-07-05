<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $room;
    public $response;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($room, $response)
    {
        $this->room = $room;
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->response == 'accept' ? 'Booking Accepted' : 'Booking Rejected';

        return $this->subject($subject)
                    ->view('email.booking_response')
                    ->with([
                        'room' => $this->room,
                        'response' => $this->response,
                    ]);
    }
}
