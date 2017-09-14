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
                <input placeholder="Upišite pitanje" id="questionTitle" type="text" name="questionTitle" class="validate">
                <label for="questionTitle" data-success="Dobro pitanje">Pitanje</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <div class="row"><label for="questionBody" class="active" >Opis</label></div>
                <textarea type="textarea" id="questionBody" class="tinyTextarea" name="questionBody"></textarea>
                <span id="bodyError" class="red-text" hidden></span>
            </div>
        </div>
        <div class="row">
            <div class="col s12 input-field">
                <div class="chips chips-placeholder"></div>
                <span id="tagError" class="red-text" hidden></span>
            </div>
        </div>
        <div class="row">
            @include('partials.errors')
        </div>
        <div class="row">
            <button id="questionFormSubmit" type="button" class="btn waves-effect waves-light col s6 offset-s3">Pitaj</button>
        </div>
    </form>
    </div>
</div>
@overwrite

