<?php

namespace App\Mail;

use App\Match;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;


    public $matches;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($matches)
    {
        $this->matches = $matches;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.testsend')->subject('这是一个标题');
    }
}
