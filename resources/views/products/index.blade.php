@extends('layout.app')

@section('title', 'Products')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-auto mb-5 text-light text-center">
            <div><img src="{{ asset($subcategory->image) }}" class="img-fluid" width="150" alt=""></div>
        </div>
    </div>

    <div class="row justify-content-center bg-light">
        <div class="col-md-9 text-center">
            <div class="row d-flex justify-content-between">
                <div class="col-md-auto mb-3">
                    <select onchange="window.location.href = this.value" class="form-select bg-light fw-bold shadow-none">
                        <option value = "" selected>Price:</option>
                        <option value = "{{ request()->fullUrlWithQuery(['price' => '0-300']) }}" {{ request()->has('price') && request()->price === '0-300' ? 'selected' : '' }}>0 - 300 &euro;</option>
                        <option value = "{{ request()->fullUrlWithQuery(['price' => '300-900']) }}" {{ request()->has('price') && request()->price === '300-900' ? 'selected' : '' }}>300 - 900 &euro;</option>
                        <option value = "{{ request()->fullUrlWithQuery(['price' => '900-']) }}" {{ request()->has('price') && request()->price === '900-' ? 'selected' : '' }}>900 &euro; and more</option>
                    </select>
                </div>

                @if(request()->query('price'))
                    <form class="col-md-auto fw-bold" action="{{ request()->fullUrl() }}" method="post">
                        @csrf
                        <label for="price">Price: {{ request()->query('price') }}</label>
                        <input type="hidden" name="price" value="price">
                        <button id="button-price" class="ms-1 btn btn-sm btn-danger shadow-none rounded-0">{{ 'X' }}</button>
                    </form>
                @endif

                @if(request()->query('order')) 
                    <form class="col-md-auto fw-bold" action="{{ request()->fullUrl() }}" method="post">
                        @csrf
                        <label for="order">Order: {{ request()->query('order') }}</label>
                        <input type="hidden" name="order" value="order">
                        <button id="button-order" class="ms-1 btn btn-sm btn-danger shadow-none rounded-0">{{ 'X' }}</button>
                    </form>
                @endif
               
                <div class="col-md-auto mb-3">
                    <select onchange="window.location.href = this.value" class="form-select bg-light fw-bold shadow-none">
                        <option value = "" selected>Sort by:</option>
                        <option value = "{{ request()->fullUrlWithQuery(['sort' => 'asc', 'order' => 'price']) }}" {{ request()->has(['sort', 'order']) && request()->sort === 'asc' && request()->order === 'price' ? 'selected' : '' }}>Price: Low - High</option>
                        <option value = "{{ request()->fullUrlWithQuery(['sort' => 'desc', 'order' => 'price']) }}" {{ request()->has(['sort', 'order']) && request()->sort === 'desc' && request()->order === 'price' ? 'selected' : '' }}>Price: High - Low</option>
                        <option value = "{{ request()->fullUrlWithQuery(['sort' => 'asc', 'order' => 'name']) }}" {{ request()->has(['sort', 'order']) && request()->sort === 'asc' && request()->order === 'name' ? 'selected' : '' }}>Name: A - Z</option>
                        <option value = "{{ request()->fullUrlWithQuery(['sort' => 'desc', 'order' => 'name']) }}" {{ request()->has(['sort', 'order']) && request()->sort === 'desc' && request()->order === 'name' ? 'selected' : '' }}>Name: Z - A</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9 text-center">
            <div class="row d-flex justify-content-center ">
                @foreach($products as $product)
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

            {{ $products->withQueryString() }}

       </div>

    </div>

</div>

@endsection