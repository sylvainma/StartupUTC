<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Suggestion extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $suggestion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $suggestion)
    {
      $this->email = $email;
      $this->suggestion = $suggestion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('mails.suggestion')
                  ->from(env('MAIL_USERNAME'), 'StartupUTC')
                  ->subject('Nouvelle suggestion StartupUTC');
    }
}
