
<link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">

<div class="container mt-5 shadow p-5 col-md-9">

    <div id="section-to-print">

        <div>

            <div class="text-start"><h3 class="fw-bold bg-light border border-5 rounded p-1"> INVOICE SUMMARY </h3></div>
            <div class="text-end"><img src="{{ asset('images/online-shop.png') }}" alt="onlineshop" width="150"></div>
        </div>
        

            <div class="row mt-5 justify-content-center fs-6"> 
                
                <div class="col text-start">

                    <div class="fw-bold">Invoice No.</div>

                    <div class="text-muted fw-bold">{{ substr($order->order_number, 0, 10) }}</div>

                </div>

                <div class="col text-end">

                    <div class="fw-bold">Order Date</div>

                    <div class="text-muted fw-bold">{{ $order->created_at->format('H:i a, d M Y') }}</div>
                    
                </div>

            </div>

        <hr>

            <div class="row mt-5 mb-5 fw-bold fs-6">

                <div class="col">
        
                    <div class="table-responsive border border-5 rounded p-1 rounded">

                        <table class="table table-sm table-bordered fw-bold">

                            <tbody>

                                <tr class="bg-light ">

                                    <th class="text-left">Shipping data</th><th class="text-end">Vendor</th>

                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->name }}</td><td class="text-muted text-end">Online Shop</td>
                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->email }}</td><td class="text-muted text-end">online.shop@example.com</td>
                                </tr>
                                
                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->phone }}</td><td class="text-muted text-end">061.234.5678</td>
                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->address }}</td><td class="text-muted text-end">Example 12</td>
                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->city }}</td><td class="text-muted text-end">Leskovac</td>
                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->postal }}</td><td class="text-muted text-end">16000</td>
                                </tr>

                                <tr>
                                    <td class="text-start text-muted">{{ $order->customer->country }}</td><td class="text-muted text-end">Serbia</td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        
        <hr>

            <div class="row mt-5 mb-5 fw-bold fs-6">

                <div class="col">

                    <div class="table-responsive border border-5 p-1 rounded">

                        <table class="table table-bordered fw-bold">

                            <tbody>

                                <tr class="bg-light">

                                    <th class="text-start">Product</th> 

                                    <th class="text-center">Quantity</th> 

                                    <th class="text-end">Price</th> 

                                    <th class="text-end">Amount</th> 

                                </tr>

                                @foreach($cart as $product)

                                    <tr>

                                        <td class="text-muted align-middle">{!! $product['name'] !!}</td>

                                        <td class="text-muted align-middle text-center">{{ $product['quantity'] }}</td>

                                        <td class="text-muted align-middle text-end col-md-2">&euro; {{ number_format($product['price'], 2) }}</td>

                                        <td class="text-muted align-middle text-end col-md-2">&euro; {{ number_format($product['price'] * $product['quantity'], 2) }}</td>

                                    </tr>

                                @endforeach

                            </tbody>
                        
                        </table>

                    </div>

                </div>

            </div>

        <hr>

            <div class="row mt-5 mb-5 fw-bold justify-content-end">
            
                <div class="col-md-5">

                    <div class="table-responsive border border-5 p-1 rounded">

                        <table class="table table-bordered fs-5 fw-bold">

                            <tbody>

                                <tr>
                                    <th class="text-start align-middle bg-light">SubTotal:</th> <td class="text-end text-muted"> &euro; {{ number_format($subtotal, 2) }}</td>
                                </tr>

                                <tr>
                                    <th class="text-start align-middle bg-light">Shipping:</th> <td class="text-end text-muted"> &euro; {{ number_format($shipping, 2) }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="text-start align-middle bg-light">Total:</th> <td class="text-end text-dark fs-4 fw-bolder"> &euro; {{ number_format($total, 2) }}</td>
                                </tr>

                            </tbody>
                        
                        </table>

                    </div>

                </div>

            </div>

        <hr>

            <button class="btn btn-dark fw-bold mt-5" onclick="window.print()">Print this page</button>

    </div>

</div>