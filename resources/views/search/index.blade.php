
@extends('layout.app')

@section('title', 'Search Result')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
                <div class="bg-light">
                    @if(request()->has('search'))
                        <span class="fs-3">{{ 'Search Result for' }}</span> <span class="fs-3 fw-bold">{{ '"' . trim(request('search')) . '"' }}</span>
                    @else 
                        <span class="fs-3 fw-bold">{{ 'Please enter a search term in the search box.' }}</span>
                    @endif
                </div>
            <h6 class="lead">{{ '(' . $products->count() . ')' }} products</h6>
            <hr>
        </div>
    </div>

    @if($products->isNotEmpty())

        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
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

    @else

        <div class="row justify-content-center mb-5">

            <div class="text-muted mt-5 col-md-auto">
                
                <div class="bg-light border border-3 rounded p-1 text-dark fw-bold small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    {{ 'Your search returned no results.' }}
                </div>

                <div class="bg-light rounded p-1 mt-3 fw-bold small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>
                    {{ 'Make sure all words are spelled correctly.' }}
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>
                    {{ 'Try other keywords.' }}
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>
                    {{ 'Try more general keywords.' }}
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>
                    {{ 'Try fewer keywords.' }}
                </div>
                
            </div>

        </div>

        <div class="fw-bold bg-light">Discount products - stocks are limited</div>

        <hr>

            <div class="row d-flex justify-content-center">
                    @foreach($discount as $product)
                        <div class="col-md-3 mb-5">
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

    @endif

</div>

@endsection