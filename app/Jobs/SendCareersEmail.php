<?php
// app/Jobs/SendCareersEmail.php

namespace App\Jobs;

use App\Mail\CareersMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCareersEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageBody;

    public function __construct($name, $email, $messageBody)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageBody = $messageBody;
    }

    public function handle()
    {
        try {
            $recipientEmail = env('CAREERS_MAIL');
            Mail::to($recipientEmail)->send(new CareersMail($this->name, $this->email, $this->messageBody));
        } catch (\Exception $exception) {
            \Log::error('Failed to send contact us email: ' . $exception->getMessage());
            throw $exception;
        }
    }
}
