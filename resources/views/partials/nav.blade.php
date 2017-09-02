<div class="navbar-fixed">
    <nav>
        <div class="navbar-fixed nav-wrapper">
            <div class="row">
                <div class="col s12">
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <a href="{{ route('home') }}" class="brand-logo">Pitaj</a>
                    <ul class="left hide-on-med-and-down">
                        <li>
                            <label for="search-box"></label>
                            <input id="search-box" type="text">
                            <i class="material-icons">search</i>
                        </li>
                    </ul>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
                    @if( Auth::check() )
                        <ul id='user-actions' class='dropdown-content'>
                            <li><a href="{{ route('user.profile', ['id' => Auth::id() ]) }}">Profil</a></li>
                            <li><a href="{{ route('session.logOut') }}">Odjava</a></li>
                        </ul>
                        <li>
                            <a class='dropdown-button' href='#' data-activates='user-actions' below-origin="true" hover="true">
                                <img src="{{ Auth::user()->avatarUrl }}" id="nav-avatar" class="circle">
                                {{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
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
<div id="dropdown-menu">
     <div id="dropDown-data" class="collection"></div>
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