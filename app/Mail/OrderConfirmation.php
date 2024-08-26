<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $totalAmountInWords;

    public function __construct($order, $totalAmountInWords)
    {
        $this->order = $order;
        $this->totalAmountInWords = $totalAmountInWords;
    }

    public function build()
    {
        return $this->view('emails.orderConfirmation')
        ->subject('Order Confirmed')
        ->with([
            'order' => $this->order,
            'totalAmountInWords' => $this->totalAmountInWords,
        ]);
    }
}
