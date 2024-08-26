<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
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
        return $this->view('emails.newOrderEmail')
        ->subject('New Order Received')
        ->with([
            'order' => $this->order,
            'totalAmountInWords' => $this->totalAmountInWords,
        ]);
    }
}
