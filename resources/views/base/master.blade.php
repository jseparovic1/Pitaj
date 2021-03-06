<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="pitaj, pitanja , odgovori, znanje, dijeljenje">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title> @yield('title') | Pitaj.hr </title>

        @include('partials.style')
    </head>
    <body>
        <header>
            @include('partials.nav')
        </header>
        <main>
            <div id="app">
                <div class="container">
                    @yield('container')
                </div>
            </div>
        </main>
        <footer class="page-footer">
            @yield('footer')
        </footer>

        @include('partials.scripts')
    </body>
    @include('partials.flash')
</html>

