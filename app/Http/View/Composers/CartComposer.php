<?php

namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Http\Controllers\TotalController;


class CartComposer {

    public static function compose(View $view) {

        $o = new TotalController;

        $view->with('cart', $o->cart);

        $view->with('subtotal', $o->subtotal);

        $view->with('shipping', $o->shipping);

        $view->with('total', $o->total);
        
    }

}