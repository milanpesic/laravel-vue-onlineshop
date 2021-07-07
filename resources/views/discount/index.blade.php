@extends('layout.app')

@section('title', 'Discount')

@section('content')

<div class="container-fluid">

    <div class="text-center mt-5 mb-5">
        <img src="{{ asset('images/discount-logo.png') }}" class="img-fluid" width="500" alt="">
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="row d-flex justify-content-center">
                @foreach($discount as $product)
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow p-2 border-0">
                            <a href="{{ route('product', $product->slug) }}" target="_blank"><img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: 10rem; object-fit: contain;"></a>
                            <div class="card-body">           
                                <p class="card-subtitle text-muted lead text-wrap fst-italic" style="height: 10vh; object-fit: contain; font-size: 16px;">{!! substr($product->name, 0, 50) . '...' !!}</p>       
                                <p class="d-flex justify-content-between mt-5">
                                    <span class="text-dark badge fs-6 bg-light">@if($product->discount) <del class="fs-6"> &euro; {{ number_format($product->price, 2) }} </del> @else &euro; {{ number_format($product->price, 2) }} @endif</span>
                                    <span class="text-dark badge fs-6 bg-warning">@if($product->discount) &euro; {{ number_format($product->discount, 2) }} @endif</span>
                                </p>

                                <hr>

                                <div class="">
                                    <a href="{{ route('product', $product->slug)}}" class="btn btn-sm btn-dark border border-dark d-grid g-5 shadow-none fs-5">Details</a>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent fw-bold">
                                <small class="text-muted">10% additional discount</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5 shadow-none mb-5">

        <div class="col-auto active">

            {{ $discount->links() }}

        </div>

    </div>

</div>

@endsection