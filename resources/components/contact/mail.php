<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedBackRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $mail;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mail, $text)
    {
        $this->name = $name;
        $this->email = $mail;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('components.contact.mail.feedback')->with([
          'name' => $this->name,
          'email' => $this->email,
          'text' => $this->text,
        ]);
    }
}
