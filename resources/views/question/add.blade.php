{{-- Forma za postavljanje pitanja --}}
@extends('base.full')

@section('title', 'Pitajte i podijelite svoje znanje')
@section('pageTitle', 'Postavite pitanje koje vas zanima')

@section('content')
    <form id="questionForm">
        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="input-field col s12">
                <input id="questionTitle" type="text" name="questionTitle" class="validate">
                <label for="questionTitle" data-error="Polje je obavezno" data-success="Dobro pitanje">Vaše pitanje</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea type="textarea" id="questionBody" name="questionBody"
                          class="materialize-textarea"
                          data-length="2000"
                          placeholder="Detaljnije opišite vaše pitanje ukoliko je to potrebno"></textarea>
                <label for="questionBody" data-success="Dobro pitanje">Dodatno objašnjenje</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label id="chip" class="validate">Tagirajte pitanje</label>
                <div class="chips chips-placeholder"></div>
            </div>
        </div>
        <div class="row">
            @include('partials.errors')
        </div>
        <div class="row">
            <button id="questionFormSubmit" type="button" class="btn waves-effect waves-light col s6 offset-s3">
                Pitaj
            </button>
        </div>
    </form>
@overwrite

