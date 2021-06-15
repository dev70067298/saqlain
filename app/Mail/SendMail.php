<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
public $detail1;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail1)
    {
        //
        $this->detail1=$detail1;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Auction Master')->view('emails.SendMail');
    }
}
