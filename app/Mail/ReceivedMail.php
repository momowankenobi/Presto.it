<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceivedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contatto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contatto)
    {
        $this->contatto = $contatto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from($this->contatto['email'])
                    ->view('mails.receivedmail');
    }
}
