<?php
// app/Mail/SendPdfEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPdfMailToCustomer extends Mailable implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $pdfPath;

    public function __construct($order, $pdfPath)
    {
        $this->order = $order;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->view('emails.sendPdfToCustomer', [
            'order' => $this->order,
        ])
        ->attach($this->pdfPath, [
            'as' => 'invoice'.$this->order->invoice_number.'.pdf',
            'mime' => 'application/pdf',
        ])
        ->subject('Thank You for Choosing Selligion Praho 2');
    }
}
