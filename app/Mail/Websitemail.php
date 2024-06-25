<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;
<<<<<<< HEAD
    public $subject, $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $body)
=======

    public $subject;
    public $body;

    public function __construct($subject,$body)
>>>>>>> master
    {
        $this->subject = $subject;
        $this->body = $body;
    }

<<<<<<< HEAD
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email')->with([
=======
    public function build()
    {
        return $this->view('email')->with([
>>>>>>> master
            'subject' => $this->subject
        ]);
    }
}
