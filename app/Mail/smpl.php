<?php
// app/Mail/SendPdfEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPdfMail extends Mailable implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $pdfPath;

    public function __construct(Order $order, $pdfPath)
    {
        $this->order = $order;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->view('emails.sendpdf', [
            'order' => $this->order,
        ])
        ->attach($this->pdfPath, [
            'as' => 'invoice.pdf',
            'mime' => 'application/pdf',
        ])
        ->subject('Your Order has been Confirmed. Download your Invoice');
    }
}
