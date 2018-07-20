<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodePress</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ route('login') }}">Administrative Panel</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CodePress
                </div>

                <h2 class="links">Your blog in one place...</h2>
            </div>
        </div>
    </body>
</html>
