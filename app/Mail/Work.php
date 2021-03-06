<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Work extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    //public $reply;
    public $sub;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $sub = 'New Client Applied To Work')
    {
        //
        $this->content = $content;
        //$this->reply = $reply;
        $this->sub = $sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->sub)
                    ->view('email.work');
    }
}
