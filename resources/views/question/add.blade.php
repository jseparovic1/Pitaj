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
                          data-length="600"
                          placeholder="Detaljnije opišite vaše pitanje ukoliko je to potrebno"></textarea>
                <label for="questionBody" data-success="Dobro pitanje">Dodatno objašnjenje</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <div class="col s12">
                    <label>Tagirajte pitanje</label>
                    <div class="chips chips-placeholder"></div>
                </div>
            </div>
        </div>
        <input id="tags" type="hidden" value="" name="tags">
        <div class="row">
            @include('partials.errors')
        </div>
        <button id="questionForm" type="button" onclick="onQuestionSubmit()" class="btn waves-effect waves-light col s6 offset-s3">
            Pitaj
        </button>
    </form>
    <script>
        function onQuestionSubmit() {
            let token = $('#token').val();
            let titleDiv = $('#questionTitle');

            let title = titleDiv.val();
            let body = $('#questionBody').val();

            console.log(title,body);

            chips = $('.chips').material_chip('data');

            if (title === '' || chips.length < 1) {
                $('label[for="questionBody"]').attr('data-error', 'Polje je obavezno');
                titleDiv.removeClass("valid");
                titleDiv.addClass("invalid");
            } else {
                chips = JSON.stringify(chips);
                $.post('/pitaj', {
                    title : title,
                    body : body,
                    tags : chips,
                    _token : token
                }).done(function (questionId) {
                    window.location.href = "/pitanja/" + questionId;
                });
            }
        }
    </script>
@overwrite

