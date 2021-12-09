<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex bgt" id="app">
        <div class="p-0 col-md-1 fixed-top">
            <div class="custom-navbar-small pl-1 d-md-none d-flex flex-column justify-content-start">
            @if($restaurant)
                <div class="navbar-logo-small my-3"> 
                    <img class="img-fluid small-nav-logo" src="{{ $restaurant->logo }}" alt="Logo">
                </div>
                <div class="small-nav-link d-flex justify-content-center align-items-center">
                    <a class="btn my-1 text-white small-nav-btn" href="{{ url('http://127.0.0.1:8000/') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
                <div class="small-nav-link d-flex justify-content-center align-items-center">
                    <a class="btn my-1 text-white small-nav-btn" href="{{ url('/admin') }}">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
                <div class="small-nav-link d-flex justify-content-center align-items-center">
                    <a class="btn my-1 text-white small-nav-btn" href="{{ url('/admin/plates') }}">
                        <i class="fas fa-utensils"></i>
                    </a>
                </div>
                <div class="small-nav-link d-flex justify-content-center align-items-center">
                    <a class="btn my-1 text-white small-nav-btn" href="{{ url('/admin/orders') }}">
                        <i class="far fa-calendar-alt"></i>
                    </a>
                </div>
                @endif
                <div class="small-nav-logout d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary small-nav-logout-btn">
                        <div class="d-flex flex-column align-items-center">
                            <a class="text-white" href="{{ route('logout') }} "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </div>
                    </button>
                </div>
            </div>
            <nav class="custom-navbar d-none d-md-inline-block" style="width: 100%; height: 100vh; ">
                <div class=" d-flex flex-column justify-content-between" style="height: 100vh;">
                    @if($restaurant)
                    <div class="d-flex flex-column align-items-center ">
                        <div class="navbar-logo d-flex justify-content-center align-items-center my-3"> 
                            <img class="img-fluid" src="{{ $restaurant->logo }}" alt="Logo">
                        </div>
                        <h4 class="text-center text-white">{{ $restaurant->name }}</h4>
                    </div>
                    <div class="navbar-links-container d-flex flex-column align-items-center">

                        <div class="nav-link d-flex justify-content-center align-items-center my-4">
                            <a class="btn nav-btn px-3" href="{{ url('http://127.0.0.1:8000/') }}">
                                <i class="fas fa-home"></i>
                                <p>{{ __('Home') }}</p>
                            </a>
                        </div>

                        <div class="nav-link d-flex justify-content-center align-items-center my-4">
                            <a class="btn nav-btn px-3" href="{{ url('/admin') }}">
                                <i class="fas fa-user"></i>
                                <p>{{ __('Admin') }}</p>
                            </a>
                        </div>

                        <div class="nav-link d-flex justify-content-center align-items-center my-4">
                            <a class="btn nav-btn px-3" href="{{ url('/admin/plates') }}">
                                <i class="fas fa-utensils"></i>
                                <p>{{ __('Plates') }}</p>
                            </a>
                        </div>

                        <div class="nav-link d-flex justify-content-center align-items-center my-4">
                            <a class="btn nav-btn px-3" href="{{ url('/admin/orders') }}">
                                <i class="fas fa-calendar-alt"></i>
                                <p>{{ __('Orders') }}</p>
                            </a>
                        </div>

                    </div>

                    @else
                    <div class="my-5">
                        <p class="text-white text-center fs-5">Ricordati di configurare il tuo ristorante!</p>
                    </div>
                    @endif
                    <button type="button" class="btn btn-primary m-2 mb-5">
                        <div class="d-flex flex-column align-items-center">
                            <a class="text-white" href="{{ route('logout') }} "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </div>
                    </button>
                </div> 
            </nav>
        </div>
        <div class="col-12 col-md-11 offset-md-1">
            <main class="py-4" style="height: 100vh;">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    @yield('script')
</body>
</html>


