@extends('master')

@section('title', 'Pitajte i podijelite svoje znanje')

@section('content')
    <div class="row">
        <form class="col s6 offset-s3">
            {{--{{ csrf_field() }}--}}
            <div class="row">
                <div class="input-field col s12">
                    <input id="question" type="text" data-length="10" name="question">
                    <label for="question" data-error="Polje je obavezno" data-success="Bravo">Vaše pitanje</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="chips chips-placeholder"></div>
                </div>
            </div>
            <div class="row ">
                @include('partials.errors')
            </div>
            <button id="questionForm" type="button" onclick="chipsFormSend()" class="btn waves-effect waves-light col s6 offset-s3">
                Pitaj
            </button>
        </form>
    </div>
@endsection