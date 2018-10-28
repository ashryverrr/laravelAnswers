<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        @include('_includes/nav/topnav')
        <main role="main" class="container-fluid mt-2">
            @yield('content')                    
        </main>

        <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>
        
    </body>
</html>
