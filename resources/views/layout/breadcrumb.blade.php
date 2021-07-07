@if(!Route::is('home'))
    <div class="badge">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-dark fw-bold" href="{{ route('home') }}">Home</a>
                </li>
            
                <li class="breadcrumb-item" aria-current="page">
                    <a class="text-decoration-none text-muted fw-bold" href="{{ url()->current() }}">@yield('title')</a>
                </li>

                @if(Route::is('category.show', 'category.subcategory.show'))
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-decoration-none text-muted {{ Route::is('category.show') ? 'fw-bold' : '' }}" href="{{ url("/products/{$category->slug}") }}">{{ $category->name }}</a>
                    </li>
                @endif

                @if(Route::is('category.subcategory.show'))
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-decoration-none text-muted {{ Route::is('category.subcategory.show') ? 'fw-bold' : '' }}" href="{{ url("/products/{$category->slug}/{$subcategory->slug}") }}">{{ $subcategory->name }}</a>
                    </li>
                @endif

                @if(Route::is('product'))
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-decoration-none text-muted {{ Route::is('product') ? 'fw-bold' : '' }}" href="{{ url("/product/{$product->slug}") }}">{!! $product->name !!}</a>
                    </li>
                @endif


            </ol>
        </nav>
    </div>
@endif