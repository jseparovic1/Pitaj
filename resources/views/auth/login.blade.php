@extends('masterAuth')

@section('title', 'Registracija')

@section('content')
    <div class="row">
        <form class="col s6 offset-s3" method="POST" action="{{ route('session.logIn') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                    <label for="email" data-error="Upišite ispravnu email adresu" >
                        Email
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password" data-success="">Lozinka</label>
                </div>
            </div>
            <div class="row ">
               @include('partials.errors')
            </div>
            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3">Log in</button>
        </form>
    </div>
@endsection