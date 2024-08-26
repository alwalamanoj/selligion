<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class SendOrderConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $order;
    protected $totalAmountInWords;

    public function __construct($email, $order, $totalAmountInWords)
    {
        $this->email = $email;
        $this->order = $order;
        $this->totalAmountInWords = $totalAmountInWords;
    }

    public function handle()
    {
        try {
            Mail::to($this->email)->send(new OrderConfirmation($this->order, $this->totalAmountInWords));
        } catch (\Exception $exception) {
            \Log::error('Failed to send order confirmation email: ' . $exception->getMessage());
            throw $exception;
        }
    }
}
