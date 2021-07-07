<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\TotalController;

class CartController extends Controller
{

    public function show() {

        return view('cart.index');

    }

    public function store(Request $request, $id) {

        $product = Product::findOrFail($id);

        $cart = session('cart');

        if(empty($cart[$id])) {

            $cart[$id] = [
                'id' => $product->id, 
                'name' => $product->name,
                'slug' => $product->slug,
                'image' => $product->image,
                'price' => !empty($product->discount) ? $product->discount : $product->price,
                'quantity' => $request->quantity,
                'shipping' => $product->shipping,
            ];

        } else {

            $cart[$id]['quantity'] = $request->quantity;
    
        }

        session(['cart' => $cart]);

        $totals = new TotalController;

        return response()->json([
            'cart' => $cart,
            'subtotal' => $totals->subtotal,
            'shipping' => $totals->shipping,
            'total' => $totals->total
        ]);

    }


    public function remove($id) {

        $cart = session('cart');

        if(isset($cart[$id])) {

            unset($cart[$id]);

        }

        session(['cart' => $cart]);

        $totals = new TotalController;

        return response()->json([
            'cart' => $cart,
            'subtotal' => $totals->subtotal,
            'shipping' => $totals->shipping,
            'total' => $totals->total
        ]);

    }

    public function clear() {

        return response()->json(session()->forget('cart'));

    }
    
}