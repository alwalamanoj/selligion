<?php
// app/Jobs/SendContactUsEmail.php

namespace App\Jobs;

use App\Mail\ContactUsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactUsEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $email;
    public $phoneNumber;
    public $messageBody;

    public function __construct($name, $email, $messageBody, $phoneNumber)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageBody = $messageBody;
        $this->phoneNumber = $phoneNumber;
    }

    public function handle()
    {
        try {
            $recipientEmail = env('CONTACT_US_MAIL');
            Mail::to($recipientEmail)->send(new ContactUsMail($this->name, $this->email, $this->messageBody, $this->phoneNumber));
        } catch (\Exception $exception) {
            \Log::error('Failed to send contact us email: ' . $exception->getMessage());
            throw $exception;
        }
    }
}
