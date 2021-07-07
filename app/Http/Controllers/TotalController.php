<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TotalController extends Controller
{
    public $cart;
    public $subtotal;
    public $shipping;
    public $total;
    public $product;

    public function __construct() {

        $this->subtotal = 0;
        
        $this->total = 0;

        $this->cart = session('cart');

        if(!empty($this->cart)) {

            foreach($this->cart as $this->product) {

                $this->subtotal = $this->subtotal + $this->product['price'] * $this->product['quantity'];
    
            }

            $this->shipping = $this->product['shipping'];

            $this->total = $this->subtotal + $this->shipping;

        }
    }
}