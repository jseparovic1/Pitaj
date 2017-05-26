<nav>
    <div class="navbar-fixed">
        <div class="row">
            <div class="col s10 offset-s1">
                <a href="#" class="brand-logo">Logo</a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @if( Auth::check() )
                        <li>
                            <a>
                                <img class="circle" src="https://api.adorable.io/avatars/10/abott@adorable.pngCopy">
                            </a>
                        </li>
                    @endif
                    <li><a href="{{ route('question.askForm') }}">Postavi pitanje</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Maybe for latter add modal -->
<div id="askQuestionModal" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>

