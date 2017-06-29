{{-- Forma za postavljanje pitanja --}}
@extends('base.full')

@section('title', 'Pitajte i podijelite svoje znanje')
@section('pageTitle', 'Uredite pitanje')

@section('content')
<div class="section">
    <div class="card-panel">
    <form id="questionForm" method="post" action="{{ route('question.update', ['id' => $question->id ]) }}">
        <div class="row">
            <div class="input-field col s12">
                <label for="questionTitle" data-error="Polje je obavezno" data-success="Dobar">Pitanje</label>
                <input id="questionTitle" type="text" name="title" value="{{ $question->title }}">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="questionBody" data-error="Polje je obavezno" data-success="Dobar">Opis</label>
                <textarea type="textarea" id="questionBody" name="body"
                          class="materialize-textarea validate"
                          data-length="2000"
                >{{ $question->body }}
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col s12 input-field">
                <div class="section">
                    <label>Tagove nije moguce uređivati!</label>
                </div>
                @foreach( $question->tags as $tag )
                    <div class="chip">{{ $tag->name }}</div>
                @endforeach
            </div>
        </div>
        <div class="row">
            @include('partials.errors')
        </div>
        <div class="row">
            <button id="questionFormSubmit"
                    type="submit"
                    class="btn waves-effect waves-light col s6 offset-s3">
                Završeno uređivanje
            </button>
        </div>
        {{ csrf_field() }}
    </form>
    </div>
</div>
@overwrite

