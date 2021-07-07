    
@extends('layout.app')

@section('title', 'Order Page')
    
@section('content')

    <div class="container">

            <form action="{{ route('order.store', $total) }}" method="post">
    
                    @csrf 

                    <div class="text-center mt-5 mb-5">
                        <h1 class="fw-bold" style="font-size: 30px; text-shadow: 2px 2px 4px #000000;">WELCOME TO ORDER PAGE</h1>
                        <small class="fw-bold">Here you can review and push your order. </small>
                    </div>  

                    <div class="row mt-5 mb-5 d-flex justify-content-center">

                        @guest
                        <div class="col-md-4 border border-light border-3 rounded p-3 mb-5 shadow"> 
                            <h4 class="fw-bold mb-5 bg-light">Customer Details</h4>
                    
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold @error('name') text-danger @enderror">Name</label>
                                <input type="text" class="form-control shadow-none @error('name') border border-danger border-2 @enderror" name="name" value="{{ old('name') }}">
                                
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label fw-bold @error('email') text-danger @enderror">Email</label>
                                <input type="email" class="form-control shadow-none @error('email') border border-danger border-2 @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>    
                        </div>
                        @endguest

                        <div class="col-md-4 border border-light border-3 rounded p-3 mb-5 shadow"> 

                            <h4 class="fw-bold mb-5 bg-light"> Shipping Details</h4>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold @error('phone') text-danger @enderror">Phone</label>
                                <input type="text" class="form-control shadow-none @error('phone') border border-danger border-2 @enderror" name="phone" value="{{ old('phone') }}">

                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div class="mb-3"> 
                                <label for="address" class="form-label fw-bold @error('address') text-danger @enderror">Address</label>
                                <input type="text" class="form-control shadow-none @error('address') border border-danger border-2 @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label fw-bold @error('city') text-danger @enderror">City</label>
                                <input type="text" class="form-control shadow-none @error('city') border border-danger border-2 @enderror" name="city" value="{{ old('city') }}">

                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label for="postal" class="form-label fw-bold @error('postal') text-danger @enderror">Postal</label>
                                <input type="text" class="form-control shadow-none @error('postal') border border-danger border-2 @enderror" name="postal" value="{{ old('postal') }}">

                                @error('postal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label fw-bold @error('country') text-danger @enderror">Country</label>
                                <input type="text" class="form-control shadow-none @error('country') border border-danger border-2 @enderror" name="country" value="{{ old('country') }}">

                                @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>

                            <div>
                                <a href="{{ route('cart.show') }}" class="btn btn-primary col-5 shadow-none" style="background: #391285!important">Back</a>

                            </div>

                        </div>


                        <div class="col-md-8 border border-light border-3 rounded p-3 mb-5 shadow">

                        <h3 class="fw-bold mb-3 bg-light"> Order Details</h3>
                        
                            <div class="table-responsive mb-3">

                                <table class="table">

                                    <tbody>

                                        <thead>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                        </thead>

                                        @foreach($cart as $id => $product)
                                        
                                            <tr class="small">
                                                <td class="text-start p-3"><a href="{{ route('product', $product['slug']) }}" target="_blank"><img src="{{ asset($product['image']) }}" alt="" style="width: 90px; height: 60px;" ></a></td>
                                                <td class="text-start align-middle p-3"><a href="{{ route('product', $product['slug']) }}" class="text-decoration-none text-wrap" target="_blank">{!! substr($product['name'], 0, 50) . '...' !!}</a></td>
                                                <td class="text-center align-middle p-3" style="width: 100px;">&euro; {{ number_format($product['price'], 2) }}</td>
                                                <td class="text-center align-middle p-3">{{ $product['quantity'] }}</td>
                                                <td class="text-center align-middle p-3" style="width: 100px;">&euro; {{ number_format($product['price'] * $product['quantity'], 2) }}</td>

                                            </tr>
                                            
                                        @endforeach    
                                        
                                    </tbody>

                                </table>

                            </div>

                            <div class="table-responsive">

                                <h3 class="fw-bold mb-3 bg-light"> Order Totals </h3>

                                <table class="table table-borderless">

                                    <tr>
                                        <th>SubTotal</th><td class="text-end fw-bold"><span>&euro; {{ number_format($subtotal, 2) }} </span></td>
                                    </tr>

                                    <tr>
                                        <th>Shipping</th><td class="text-end fw-bold"><span>&euro; {{ number_format($shipping, 2) }}</span></td>
                                    </tr>

                                    <tr>
                                        <th>Total</th><td class="text-end fw-bold"><span class="badge bg-success" style="font-size: 16px;">&euro; {{ number_format($total, 2) }}</span></td>
                                    </tr>

                                </table>


                                <hr>

                                <input type="submit" name="submit" class="fw-bold g-5 col-3 btn btn-primary shadow-none" style="background: #391285!important" value="Order">

                            </div>
                        
                        </div>

                    </div>

                </form>

    </div>

@endsection