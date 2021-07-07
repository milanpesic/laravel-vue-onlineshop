
@extends('layout.app')

@section('title', 'Shopping History')

@section('content')

<div class="container mt-5 mb-5">

    @if($orderSummary->isNotEmpty())
            
            <h1>Hello, {{ auth()->user()->name }}!</h1>

            <div>Your shopping history:</div>

            @foreach($orderSummary as $order)

                <table class="table table-bordered border border-3 fw-bold mt-5 shadow small">

                    <tr>
                        <th class="text-start" colspan="2">Shopping date: {{ $order->created_at->format('H:i a, d M Y') }}</th>
                    </tr>

                    @foreach($order->order_details as $cart)

                        <tr>
                            <td><a href="{{ route('product', $cart->product->slug) }}" target="_blank"><img src="{{ asset($cart->product->image) }}" width="120" class="img-thumbnail"></a></td>
                            <td class="align-middle small">
                                <div class="fst-italic text-dark"><a href="{{ route('product', $cart->product->slug) }}" target="_blank">{!! substr($cart->product->name, 0, 50) !!}...</a></div>
                                <div class="fw-bold">Quantity: {{ $cart->quantity }} </div>
                                <div class="fw-bold">
                                    @if($cart->product->discount)

                                    <div class="align-middle text-nowrap">Price:  &euro; {{ $cart->product->discount }}</div>
                                    <div class="align-middle text-nowrap">Total: &euro; {{ number_format($cart->product->discount * $cart->quantity, 2) }}  </div>

                                    @else 

                                    <div class="align-middle text-nowrap">Price: &euro; {{ $cart->product->price }}</div>
                                    <div class="align-middle text-nowrap">Total: &euro; {{ number_format($cart->product->price * $cart->quantity, 2) }}  </div>
                            
                                    @endif
                                </div>
                            </td>

                        </tr>

                        <tr>
                            
                            <td colspan="2">

                                @if($review_confirmed->contains('product_id', $cart->product->id))
                                    
                                    <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                                            </svg>
                
                                            <span class="fw-bold small">Your rate for this product is:</span>
                                            <span class="m-3 rounded-pill border border-3 p-1 fs-3 fw-bold ">{{ number_format($review_confirmed->where('product_id', $cart->product->id)->first()->rate, 1) }}
                                            </span>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                                            </svg>
                                            <span class="fw-bold small">Your review for this product is:</span>
                                            <div class="small">{{ $review_confirmed->where('product_id', $cart->product->id)->first()->review }}</div>
                                        </div>

                                @elseif($review_not_confirmed->contains('product_id', $cart->product->id))

                                    <div class="row m-1">
                                        <div class="col-md-12 alert alert-warning fw-bold small">Your review is added successfully, waiting for confirmation.</div>
                                    </div>

                                @else

                                    <rate-product
                                        :product-id = "'{{ $cart->product->id }}'"                                   
                                        :review-route = "'{{ route('review') }}'">
                                    </rate-product>
                                    
                                @endif

                            </td>
                        </tr>
                        
                    @endforeach

                    <tr>
                        <td class="align-middle">
                            <div id="{{ 'review-added-' . $cart->product->id }}">

                                PDF invoice:
                            
                                <a class="text-decoration-none text-dark" href="{{ asset('storage/' . 'invoice-' . strtolower($order->order_number) . '.pdf') }}" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-pdf text-danger" viewBox="0 0 16 16">
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class="small">
                            <div class=""> Shipping: &euro; {{ $cart->product->shipping }} </div>
                            <div class="fs-5"> Total:  &euro; {{ number_format($order->total, 2) }}</div>
                        </td>
                    </tr>

            </table>
        
            @endforeach

    @else

        <div class="container text-dark text-center" style="margin-top: 200px; margin-bottom: 200px; font-size: 30px; text-shadow: 2px 2px 4px #000000;">

            <h1 class="fw-bold">Your shopping history is empty!</h1>

        </div>

    @endif

</div>

@endsection