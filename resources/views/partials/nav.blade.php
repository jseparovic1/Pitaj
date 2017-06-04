<div class="navbar-fixed">
    <nav>
        <div class="navbar-fixed">
            <div class="row">
                <div class="col s12">
                    <a href="{{ route('home') }}" class="brand-logo">Pitaj</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
                        @if( Auth::check() )
                            <li>
                                <a class='dropdown-button'
                                   href='#'
                                   data-activates='user-actions'
                                   below-origin="true"
                                   hover="true"
                                >
                                    <img id="nav-avatar" src="{{ Auth::user()->avatarUrl }}"/>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                            </li>

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
