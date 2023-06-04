<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>

    {{-- Bootsrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

    {{-- Fontawesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    @yield('other-css')
    @yield('other-plugin')
</head>

<body>
    {{-- navbar --}}
    @include('components.other.navbar')

    {{-- content --}}
    <div class="container py-5">
        @yield('content')
    </div>

    {{-- footer --}}

    {{-- bundle bootsrap --}}
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Jquery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Fontawesome CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    {{-- Sweetalert CDN --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- My Script --}}
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('other-js')
</body>

</html>
