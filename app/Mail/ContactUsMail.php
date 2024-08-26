<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageBody;
    public $phoneNumber;

    public function __construct($name, $email, $messageBody, $phoneNumber)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageBody = $messageBody;
        $this->phoneNumber = $phoneNumber;
    }

    public function build()
    {
        return $this->view('emails.contactUsEmail')
            ->subject('New Contact Us Form Submission');
    }
}
