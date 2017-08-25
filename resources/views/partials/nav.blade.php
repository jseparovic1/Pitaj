<div class="navbar-fixed">
    <nav>
        <div class="navbar-fixed nav-wrapper">
            <div class="row">
                <div class="col s12">
                    <a href="{{ route('home') }}" class="brand-logo">Pitaj</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="/search"><i class="material-icons">search</i></a></li>
                        <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
                    @if( Auth::check() )
                        {{--<li><a><img src="{{ Auth::user()->avatarUrl }}" id="nav-avatar" class="circle"></a></li>--}}
                        <li><a class='dropdown-button' href='#' data-activates='user-actions' below-origin="true" hover="true">
                                {{ Auth::user()->name }}
                        </a></li>
                        <ul id='user-actions' class='dropdown-content'>
                            <li><a href="{{ route('session.logOut') }}">Odjava</a></li>
                        </ul>
                    @else
                        <li><a href="{{ route('session.loginForm') }}">Prijava</a></li>
                        <li><a href="{{ route('register.showForm') }}">Registracija</a></li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<ul class="side-nav slide-out" id="mobile-demo">
    <li><a class="light">Pitaj.hr</a></li>
    <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
    @if( Auth::check() )
        <li><a href="{{ Auth::user()->profileUrl() }}">Profil</a></li>
        <li><a href="{{ route('session.logOut') }}">Odjava</a></li>
    @else
        <li><a href="{{ route('register.showForm') }}">Registracija</a></li>
        <li><a href="{{ route('session.loginForm') }}">Prijava</a></li>
    @endif
</ul>
