<?php
namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdfMailToCustomer;
use App\Mail\SendPdfMailToSalesTeam;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Traits\NumberToWordsTrait;

class GenerateInvoiceAndSendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, NumberToWordsTrait;

    protected $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle()
    {
        $order = Order::find($this->orderId);

        if (!$order) {
            return; // or throw an exception, log, etc.
        }

        $totalAmount = $order->amount;
        $totalAmountInWords = $this->numberToWord($totalAmount);

        $data = [
            'order' => $order,
            'totalAmountInWords' => $totalAmountInWords,
            'title' => 'Download Invoice - Selligion',
        ];

        $pdf = Pdf::loadView('Frontend.Product.invoice', $data);
        $pdf->setPaper('a4', 'potrait');
        // Save the PDF to the public/invoices folder
        $pdfPath = public_path('invoices/invoice_' . $order->custom_order_id . '.pdf');
        $pdf->save($pdfPath);

        // Send the email with the PDF attachment
        //To Customer
        try{
            $customerEmail = $order->address->email;
            Mail::to($customerEmail)->send(new SendPdfMailToCustomer($order, $pdfPath));
        } catch (\Exception $exception) {
            \Log::error('Failed to send Order Mail to Customer: ' . $exception->getMessage());
            throw $exception;
        }
        //To Sales Team
        try{
            $recipients = [env('NEW_ORDER_MAIL1'), env('NEW_ORDER_MAIL2')];
            foreach ($recipients as $recipient) {
                Mail::to($recipient)->send(new SendPdfMailToSalesTeam($order, $pdfPath));
            }
        } catch (\Exception $exception) {
            \Log::error('Failed to send Order Mail to Sales Team: ' . $exception->getMessage());
            throw $exception;
        }
    }

    // Function which returns number to words
    public function numberToWord($num)
    {
        $num    = (string) ((int) $num);

        if ((int) ($num) && ctype_digit($num)) {
            $words  = array();

            $num    = str_replace(array(',', ' '), '', trim($num));

            $list1  = array(
                '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven',
                'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen',
                'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
            );

            $list2  = array(
                '', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty',
                'seventy', 'eighty', 'ninety', 'hundred'
            );

            $list3  = array(
                '', 'thousand', 'million', 'billion', 'trillion',
                'quadrillion', 'quintillion', 'sextillion', 'septillion',
                'octillion', 'nonillion', 'decillion', 'undecillion',
                'duodecillion', 'tredecillion', 'quattuordecillion',
                'quindecillion', 'sexdecillion', 'septendecillion',
                'octodecillion', 'novemdecillion', 'vigintillion'
            );

            $num_length = strlen($num);
            $levels = (int) (($num_length + 2) / 3);
            $max_length = $levels * 3;
            $num    = substr('00' . $num, -$max_length);
            $num_levels = str_split($num, 3);

            foreach ($num_levels as $num_part) {
                $levels--;
                $hundreds   = (int) ($num_part / 100);
                $hundreds   = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ($hundreds == 1 ? '' : 's') . ' ' : '');
                $tens       = (int) ($num_part % 100);
                $singles    = '';

                if ($tens < 20) {
                    $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
                } else {
                    $tens = (int) ($tens / 10);
                    $tens = ' ' . $list2[$tens] . ' ';
                    $singles = (int) ($num_part % 10);
                    $singles = ' ' . $list1[$singles] . ' ';
                }
                $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_part)) ? ' ' . $list3[$levels] . ' ' : '');
            }
            $commas = count($words);
            if ($commas > 1) {
                $commas = $commas - 1;
            }

            $words  = implode(', ', $words);

            $words  = trim(str_replace(' ,', ',', ucwords($words)), ', ');
            if ($commas) {
                $words  = str_replace(',', ' and', $words);
            }

            return $words;
        } else if (!((int) $num)) {
            return 'Zero';
        }
        return '';
    }

}
