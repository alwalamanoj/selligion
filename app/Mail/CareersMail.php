<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CareersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageBody;

    public function __construct($name, $email, $messageBody)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->view('emails.careersEmail')
            ->subject('New Careers Form Submission');
    }
}
