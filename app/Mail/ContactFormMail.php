<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this -> data = $data;
    }

    public function build() {
        return $this->subject('Fruitkha reply to contact')
                    ->view('front.contact.contactEmail')
                    ->with('data', $this->data);

    }
}
