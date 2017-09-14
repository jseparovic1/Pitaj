@if( Auth::check() )
    <div class="section">
        <form method="POST" action="{{ route('question.answer',['id' => $question->id]) }}">
            {{ csrf_field() }}
            <div class="input-field">
                <textarea id="textarea1" class="materialize-textarea" name="body"></textarea>
                <label for="textarea1">Vaš cijenjeni odgovor</label>
            </div>
            @include('partials.errors')
            <div class="input-field">
                <input type="submit" class="btn btn-default">
            </div>
        </form>
    </div>
@else
    <div class="section center-align">
        <a href="{{ route('session.loginForm') }}" class="waves-effect waves-light btn">
            Prijavite se
        </a>
        ili
        <a href="{{ route('register.showForm') }}" class="waves-effect waves-light btn">
            Registrirajte
        </a>
        <p>da bi odgovorili na pitanje</p>
    </div>
@endif
