@extends('layout.app')

@section('title', 'Products')

@section('content')

    <div class="container">

        <div class="mt-5 fs-1"><h1 class="text-center" style="text-shadow: 2px 2px 4px #000000;">{{ $category->name }}s by manufacturer</h1></div>
            <div class="row row-cols-1 row-cols-md-2 mt-5">
                @foreach($subcategories as $subcategory)
                    <div class="col mb-5">
                    <div class="card shadow p-5">
                        <a href="{{ route('category.subcategory.show', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}"><img src="{{ asset($subcategory->image) }}" class="card-img-top" alt="..." style="width: 100%; height: 10rem; object-fit: contain;"></a>
                        <div class="card-body">
                        <h5 class="card-title"><a class="btn btn-warning fw-bold mt-3 mb-3 shadow-none" href="{{ route('category.subcategory.show', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>     
    </div>

@endsection