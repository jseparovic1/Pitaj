@extends('masterAuth')

@section('title', 'Registracija')

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('register.create') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate" name="firstName">
                    <label for="first_name">Ime </label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate" name="lastName">
                    <label for="last_name">Prezime</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password" data-success="">Lozinka</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="repeat_password" type="password" class="validate" name="password_confirmation">
                    <label for="repeat_password">Potvrdite lozinku</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email" data-error="Upišite ispravnu email adresu" >
                        Email
                    </label>
                </div>
            </div>
            <div class="row ">
               @include('partials.errors')
            </div>
            <input type="submit" class="btn waves-effect waves-light col s6 offset-s3" value="Register">
        </form>



    </div>
@endsection