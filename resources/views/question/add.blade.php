@extends('base.full')

@section('title', 'Pitajte i podijelite svoje znanje')

@section('content')
    <div class="col s8 offset-s2">
        <form id="questionForm">
            <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="question" type="text" data-length="200" name="question" class="validate">
                    <label for="question" data-error="Max 200 znakova" data-success="Dobro pitanje">Vaše pitanje</label>
                </div>
            </div>
            <div class="row">
                <label>Dodajte tagove</label>
                <div class="col s12">
                    <div class="chips chips-placeholder"></div>
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
    </div>
    <script>
        function onQuestionSubmit() {
            let token = $('#token').val();
            let question = $('#question');
            let questionVal = question.val();

            chips = $('.chips').material_chip('data');

            if (questionVal === '' || chips.length < 1) {
                $('label[for="question"]').attr('data-error', 'Polje je obavezno');
                question.removeClass("valid");
                question.addClass("invalid");
            } else {
                chips = JSON.stringify(chips);
                $.post('/pitaj', {
                    question : questionVal,
                    tags : chips,
                    _token : token
                }).done(function (data) {
                    console.log(data);
                    window.location.href = "/";
                });
            }
        }
    </script>
@overwrite

