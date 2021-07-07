<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
    <link rel="icon" type="image/svg" href="{{ asset('images/shop.svg') }}">
    <title>@yield('title')</title>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
</head>
<body>
    <div id="app" class="bg-light" v-cloak>

        <div class="container p-3">

            @include('layout.header')

           <!-- @include('layout.breadcrumb') -->
    
            @yield('content')

            @include('layout.footer')

        </div>

    </div>
        
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap5.js') }}"></script>

</body>
</html>