<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use PDF;

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {

        $pdf = PDF::loadView('invoicepdf.index', ['order' => $this->order]);

        Storage::disk('public')->put('invoice-' . strtolower($this->order->order_number) . '.pdf', $pdf->output());

        return $this->markdown('email.customer', ['url' => asset('storage/' . 'invoice-' . strtolower($this->order->order_number) . '.pdf')])
                        ->subject('OnlineShop - Invoice')
                        ->attachData($pdf->output(), 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ]);
    }
}