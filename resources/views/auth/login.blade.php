@extends('base.full')

@section('title', 'Prijava')
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
        <div class="row center-align">
            <div class="col s12">
                <button type="submit" class="btn waves-effect waves-light col s6 offset-s3">Prijava</button>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="row center-align">
                <div class="col s12">
                    <a href="{{ route('login_fb',['provider' => 'facebook']) }}" class="btn s12" style="background-color: mediumblue"> Facebook prijava</a>
                </div>
            </div>
            <div class="row center-align">
                <div class="col s12">
                    <a href="{{ route('login_fb',['provider' => 'google']) }}" class="btn s12" style="background-color :red"> Google prijava</a>
                </div>
            </div>
            <div class="row center-align">
                <span class="text-muted">Ako nemate račun registrirajte se</span>
                <a href="{{ route('register.showForm') }}">ovdje</a>
            </div>
        </div>
    </form>
@endsection