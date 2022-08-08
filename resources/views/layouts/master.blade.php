<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>@yield('headline')</h1>
            </div>
        </div>
        @yield('content')
    </div>
    </body>
</html>
