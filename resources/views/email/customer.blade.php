@component('mail::message')

# Order Shipped - No. {{ substr($order->order_number, 0, 10)}} 

Hello, {{ $order->customer->name }}! 

Your order has been stored!

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent