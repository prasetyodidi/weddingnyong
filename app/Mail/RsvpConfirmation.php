<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RsvpConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $rsvp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $message, $confirmation)
    {
        $this->rsvp = [
            'name' => $name,
            'message' => $message,
            'confirmation' => $confirmation,
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@weddingnyong.tech', 'RSVP Confirmation')
            ->view('emails.test')
            ->with([
                'name' => $this->rsvp['name'],
                'messageGuestBook' => $this->rsvp['message'],
                'confirmation' => $this->rsvp['confirmation'],
            ]);
    }
}
