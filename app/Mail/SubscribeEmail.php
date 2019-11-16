<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * подписчик
     * @var
     */
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subs)
    {
        $this->subscriber = $subs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify', ['subscriber' => $this->subscriber]);
    }
}
