<div class="navbar-fixed">
    <nav>
        <div class="navbar-fixed">
            <div class="row">
                <div class="col s12">
                    <a href="{{ route('home') }}" class="brand-logo">Pitaj</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
                        @if( Auth::check() )
                            <li class="collection-item avatar">
                               <img class="circle" src="{{ Auth::user()->avatarUrl }}"/>
                            </li>
                            <li><a href="{{ route('session.logOut') }}">Odjava</a></li>
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
