<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $body)
    {
      $this->name = $name;
      $this->email = $email;
      $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('mails.contact')
                  ->from(env('MAIL_USERNAME'), 'StartupUTC')
                  ->subject('Nouveau message StartupUTC');
    }
}
