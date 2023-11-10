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

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- Sweetalert CDN --}}

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- AOS CDN --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    {{-- Other CSS --}}
    @yield('other-css')
    @yield('other-plugin')
</head>

<body>
    <div class="d-flex" id="wrapper" style="position: fixed; width: 100%;">
        {{-- navbar --}}
        @include('components.other.navbar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light app-bg-secondary border-bottom">
                <div class="container-fluid">
                    <button class="" id="sidebarToggle" style="background-color: transparent; border: none"><i
                            class="fas fa-bars text-white"></i></button>
                    {{-- logo --}}
                    <a class="navbar-brand text-white ms-3" href="{{ route('landing') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="" height="30"
                            class="d-inline-block align-text-top">
                        Tabloid Pendi.Indo
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    {{-- search --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            {{-- search --}}
                            <form class="d-flex mx-2">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">Search</button>
                            </form>

                            {{-- about --}}
                            <li class="nav-item mx-2">
                                <a class="nav-link text-white" href="{{ route('about') }}">About</a>
                            </li>
                            {{-- button login & register --}}
                            @if (Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="GET"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white mx-2" href="{{ route('auth') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white ms-2" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- content --}}
            <div class="container-fluid px-0 pb-5" style="height: 100vh; overflow-y: auto">
                @yield('hero')
                <div class="container-fluid">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
                @include('components.other.footer')
            </div>
        </div>
    </div>

    {{-- footer --}}

    {{-- bundle bootsrap --}}

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

    <script>
        /*!
         * Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
         * Copyright 2013-2023 Start Bootstrap
         * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
         */
        // 
        // Scripts
        // 

        window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                        'sb-sidenav-toggled'));
                });
            }

        });
    </script>
</body>

</html>
