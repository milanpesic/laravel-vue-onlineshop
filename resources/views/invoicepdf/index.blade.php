
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    body {
        font-family: tahoma;
        padding-right: 0 !important;
        font-size: 12px;
    }

    @page {
        header: page-header;
        footer: page-footer;
    }

    .mt-5 {
        margin-top: 50px;
    }

    .mb-5 {
        margin-bottom: 50px;
    }

    .text-muted {
        color: gray;
    }

    .fw-bold {
        font-weight: bold;
    }

    .fw-bolder {
        font-weight: bolder;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: left;
        
    }

    .text-end {
        text-align: right;
    }

    .bg-light {
        background:  gray;
        padding: 8px;
        color: white;
    }

    .border {
        border: 3px solid black;
        padding: 3px;
        border-radius: 5px;
    }

    table {
        border: none;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
        background-color: #f2f2f2;
    }

    th {
        background-color: gray;
        color: white;
    }

</style>

<body>
    
    <htmlpageheader name="page-header">
        <div class="text-end"><img src="{{ public_path('images/online-shop.png') }}" alt="onlineshop" width="100"></div>
    </hmtlpageheader>

        <div class="container fw-bold">

            <div>
                <div class="mb-5"><h3 class="fw-bold bg-light"> INVOICE SUMMARY </h3></div>
            
                <div class="text-start" style="float: left; width: 30%">
                    <div class="fw-bold">Invoice No.</div>
                    <div class="text-muted fw-bold">{{ substr($order->order_number, 0, 10) }}</div>
                </div>

                <div class="text-end" style="float: right; width: 30%">
                    <div class="fw-bold">Order Date</div>
                    <div class="text-muted fw-bold">{{ $order->created_at->format('H:i a, d-F-Y') }}</div>
                </div>
            
                <div style="clear: both; margin: 0pt; padding: 0pt; "></div>
        
            </div>

            <hr>

            <div class="">

                <small>Shipping Details</small>

                <table class="table fw-bold">

                    <tbody>

                        <tr class="bg-light">

                            <th class="text-start">Shipping data</th><th class="text-end">Vendor</th>

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
        
        <hr>

            <div class="">

                <small>Products Details</small>

                <table class="table fs-6 fw-bold">

                    <tbody>

                                <tr class="bg-light">

                                    <th class="text-start">Product</th> 

                                    <th class="text-center">Quantity</th> 

                                    <th class="text-end">Price</th> 

                                    <th class="text-end">Amount</th> 

                                </tr>

                                @foreach($cart as $product)

                                    <tr>

                                        <td class="text-muted">{!! $product['name'] !!}</td>

                                        <td class="text-muted text-center">{{ $product['quantity'] }}</td>

                                        <td class="text-muted text-end">&euro; {{ number_format($product['price'], 2) }}</td>

                                        <td class="text-muted text-end">&euro; {{ number_format($product['price'] * $product['quantity'], 2) }}</td>

                                    </tr>

                                @endforeach

                            </tbody>
                        
                </table>

            </div>

            <hr>

            <div>
                <div class="mt-5" style="float: right; width: 50%; ">

                    <small>Totals Summary</small>
                
                    <table class="table fs-5 fw-bold" >

                                <tbody>

                                    <tr>
                                        <th class="text-start bg-light">SubTotal:</th> <td class="text-end fw-bold text-muted"> &euro; {{ number_format($subtotal, 2) }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-start bg-light">Shipping:</th> <td class="text-end fw-bold text-muted"> &euro; {{ number_format($shipping, 2) }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="text-start bg-light">Total:</th> <td class="text-end fs-4 fw-bold" style="font-size: 14px;"> &euro; {{ number_format($total, 2) }}</td>
                                    </tr>

                                </tbody>
                            
                    </table>
                

                </div>
            </div>
</div>

<htmlpagefooter name="page-footer">
    <div class="fw-bold" style="font-size: 20px; font-style: italic;"> <img src="{{ public_path('images/online-shop.png') }}" alt="onlineshop" width="100"> Thank you for shopping with us! </div>
</htmlpagefooter>

</body>
</html>