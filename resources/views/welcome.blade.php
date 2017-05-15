<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pitaj | Imamo odgovor za sve </title>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/css/app.css">

        <!-- Materialize js -->
        {!! MaterializeSass::includeMaterialize() !!}
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <blockquote>
                    This is an example quotation that uses the blockquote tag.
                </blockquote>
                <h1> Materialize header </h1>
                <div class="divider"></div>
                <div class="section">
                    <h5>Section 1</h5>
                    <p>Stuff</p>
                </div>
                <div class="row collection">
                    <a href="#" class="collection-item"><span class="badge">1</span>Alan</a>
                    <a href="#" class="collection-item"><span class="new badge">4</span>Alan</a>
                    <a href="#" class="collection-item">Alan</a>
                    <a href="#" class="collection-item"><span class="badge">14</span>Alan</a>
                </div>
                <div class="divider"></div>
                <div class="row col s12 z-depth-1">
                    <div class="section">
                        <h5>Section 2</h5>
                        <p>Stuff</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
