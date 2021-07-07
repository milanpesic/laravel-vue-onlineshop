@extends('layout.app')

@section('title', 'Product')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-around">

        <div class="col-md-6 mt-5">

            <img src="{{ asset($product->image) }}" class="img-thumbnail" alt="..." width="">

        </div>

        <div class="col-md-6 mt-5">

            <div class="badge bg-success mb-3">@if($product->stock >= 5) {{ 'In stock' }} @endif</div>

            <div class="badge bg-warning mb-3">@if($product->stock < 5 && $product->stock >= 1) {{ 'Low stock' }} @endif</div>

            <div class="badge bg-danger mb-3">@if($product->stock === 0) {{ 'Out of stock'}} @endif</div>
             
            <p>
                <span class="fs-5 fw-bold">{!! $product->name !!}</span>
            </p>

            @if($review->isNotEmpty() && $review->count() >= 1)
           
            <div class="d-flex align-items-center">
                <span class="border border-5 p-3 fs-3 rounded-pill fw-bold">{{ number_format($review->avg('rate'), 1) }}</span>
                <span class="small text-dark ms-3 me-3">
                   <a class="text-dark" href="#ratings">{{ $review->count() . ' ratings ' }}</a> 
                </span>
                <span>|</span>
                <span class="small text-dark ms-3 me-3">
                    <a class="text-dark" href="#answers">{{ $question->count() ? $question->count() . ' answered questions' : 'no questions yet'  }}</a> 
                </span>
            </div>
            
            @else 

                <div class="fw-bold badge text-dark border border-3 small">NOT RATED YET</div>

            @endif

                <p class="mt-5"><span class="fs-5"> @if($product->discount) <del>&euro; {{ number_format($product->price, 2) }} </del> @else <span class="text-success fs-3 fw-bold"> &euro; {{ number_format($product->price, 2) }}</span>@endif</span>
                            
                    @if($product->discount)
        
                        <div class="text-success fs-3 fw-bold"> &euro; {{ number_format($product->discount, 2)}}</div>
        
                    @endif
    
                </p>

                <hr>

                <p>
                    <add-product :id="{{ $product->id }}" :cart="{{ json_encode($cart) }}"></add-product>
                </p>
                        
        </div>   

    </div> 

    <div class="row justify-content-center mt-5">

        <div class="col-md-auto">

            <h6 class="font-weight-bold adge">Description</h6>

            <p class="text-dark" style="font-size: 14px;">{!! $product->description !!}</p>

        </div>

    </div>

    <div class="mt-5" id="ratings">
        
        <h3 class="fw-bold">Customer Reviews</h3>

        @if($review->isEmpty())

            <div class="fw-bold badge text-dark border border-3 mt-3 small">NOT RATED YET</div>

        @endif

        <hr>

        @if($review->isNotEmpty())
            
                @foreach($review as $evaluate)

                        @if($evaluate->rate === 5)
                            @for ($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            @endfor
                        @endif

                        @if($evaluate->rate === 4)
                            @for ($i = 1; $i <= 4; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            @endfor
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        @endif

                        @if($evaluate->rate === 3)
                            @for ($i = 1; $i <= 3; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            @endfor
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        @endif

                        @if($evaluate->rate === 2)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>

                            @for ($i = 1; $i <= 3; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                            @endfor
                        @endif

                        @if($evaluate->rate === 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            @for ($i = 1; $i <= 4; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                            @endfor
                        @endif
                            
                        <div class="small mt-1">{{ $evaluate->review }}</div> 
                        <div class="mt-3 fw-bold">{{ App\Models\User::firstWhere('id', $evaluate->user_id)->name }}</div>
                        <div class="small">{{ $evaluate->created_at->format('H:i:s d.m.Y') }}</div>
                   
                    <hr>

                @endforeach
            
        @endif
        
    </div>

    <div class="mt-5" id="answers">

        <h3 class="fw-bold">Questions and answers</h3>
    
        <hr>

        @if($question->isNotEmpty())
            @foreach($question as $asked)
                <div class="row p-3 mb-3 border shadow justify-content-between">
                    <div class="col-md-auto small fw-bold">
                        {{ $asked->name }}
                    </div>
                    <div class="col-md-auto small">
                        {{ $asked->created_at->format('H:i:s d-m-Y') }}
                    </div>
                    <div class="small">
                        {{ $asked->question }}
                    </div>
                    <div>
                        <div class="row ms-5 alert alert-dark shadow mt-3 justify-content-between">
                            <div class="col-md-12">
                                <div class="row ms-5 justify-content-between">
                                    <div class="col-md-auto small fw-bold">Admin</div>
                                    <div class="col-md-auto small fw-bold">{{ $asked->updated_at->format('H:i:s d-m-Y') }}</div>
                                    <div class="small">
                                        {{ $asked->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @endif
    

    <div id="ask">

        @if(session()->has('question-asked'))

            <small class="alert alert-warning fw-bold">{{ session('question-asked') }}</small>
        
        @else


            <form action="{{ route('question', ['#ask']) }}" method="post" class="col-md-6">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" name="name">

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="question" class="form-label fw-bold">Your question</label>
                    <textarea class="form-control" name="question" rows="3"></textarea>

                    @error('question') 
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>

        @endif
    
    </div>

</div>
        
</div>

@endsection