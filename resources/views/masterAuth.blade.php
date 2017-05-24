<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pitaj, pitanja , odgovori, znanje, dijeljenje">

    <title> @yield('title') | pitaj.hr </title>

    @include('partials.style')
    @include('partials.scripts')
</head>
<body>
    <main>
        <div class="container">
            <div class="row main">
                <div class="col s8 offset-s2">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
    </footer>
</body>
</html>
