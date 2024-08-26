<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderMail;

class SendNewOrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $totalAmountInWords;

    public function __construct($order, $totalAmountInWords)
    {
        $this->order = $order;
        $this->totalAmountInWords = $totalAmountInWords;
    }

    public function handle()
    {
        try{
            $recipients = [env('NEW_ORDER_MAIL1'), env('NEW_ORDER_MAIL2')];
            foreach ($recipients as $recipient) {
                Mail::to($recipient)->send(new NewOrderMail($this->order, $this->totalAmountInWords));
            }
        } catch (\Exception $exception) {
            \Log::error('Failed to send new Order mail to Selligion Team email: ' . $exception->getMessage());
            throw $exception;
        }
    }
}
