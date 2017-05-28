<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="pitaj, pitanja , odgovori, znanje, dijeljenje">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title> @yield('title') | Pitaj.hr </title>

        @include('partials.style')
    </head>
    <body>
        <header>
            @include('partials.nav')
        </header>
        <main>
            <div class="container">
                <div class="row main">
                    @yield('content')
                    @yield('sidebar')
                </div>
            </div>
        </main>
        <footer class="page-footer">
            @include('partials.footer')
        </footer>
        @include('partials.scripts')
    </body>
</html>
