<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailingService extends Mailable
{
    use Queueable, SerializesModels;

    public $messagedata;

    public function __construct($data)
    {
        $this->messagedata = $data;
    }


    public function build()
    {
        return $this
        ->subject($this->messagedata->subject)
        ->view('mail.testemail');
    }
}
