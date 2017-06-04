@extends('base.full')

@section('title', 'Login')
@section('pageTitle', 'Prijava')

@section('content')
    <form method="POST" action="{{ route('session.logIn') }}">
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
        <div class="row">
            <div class="input-field">
                <button type="submit" class="btn waves-effect waves-light col s6 offset-s3">Log in</button>
            </div>
        </div>
        <div class="row center-align">
            <div>Ili</div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="row center-align">
                <div class="col s12">
                    <a href="{{ route('login_fb',['provider' => 'facebook']) }}" class="btn s12" style="background-color: mediumblue"> Log in with facebook</a>
                </div>
            </div>
            <div class="row center-align">
                <div>or</div>
            </div>
            <div class="row center-align">
                <div class="col s12">
                    <a href="{{ route('login_fb',['provider' => 'google']) }}" class="btn s12" style="background-color :red"> Log in with google+</a>
                </div>
            </div>
        </div>
    </form>
@endsection