<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ordermail extends Mailable
{
    use Queueable, SerializesModels;
    public $cartData;
    public $itemsCart;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartData, $itemsCart)
    {
        $this->cartData = $cartData;
        $this->itemsCart = $itemsCart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('keywords.order-action'))->view('Mail.order');
    }
}
