
@extends('layout.app')

@section('title', 'Cart')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">

            <update-cart 
                :cart="{{ json_encode($cart) }}" 
                :subtotalv="{{ $subtotal }}"
                :shippingv="{{ $shipping }}"
                :totalv="{{ $total }}">
            </update-cart>

        </div>

    </div>

@endsection