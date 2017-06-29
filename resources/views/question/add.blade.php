{{-- Forma za postavljanje pitanja --}}
@extends('base.full')

@section('title', 'Pitajte i podijelite svoje znanje')
@section('pageTitle', 'Postavite pitanje koje vas zanima')

@section('content')
<div class="section">
    <div class="card-panel">
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
                <label for="questionTitle" data-error="Polje je obavezno" data-success="Dobar opis">Dodatan opis</label>
                <textarea type="textarea" id="questionBody" name="questionBody"
                          class="materialize-textarea validate"
                          data-length="2000">
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col s12 input-field">
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
    </div>
</div>
@overwrite

