<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveboo</title>

        {{-- per mettere vue aggiungiamo il css --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
                
    </head>
    <body>
        <div >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        {{-- <a href="{{ url('/admin') }}">Dashboard</a> --}}

                    @else

                    @endauth
                </div>
            @endif
        </div>
        <div id="root"></div>
        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>
