@extends('master')

@section('title', 'Pitajte i podijelite svoje znanje')

@section('content')
    <div class="col s12 m4 l8">
        <h5>Aktualno</h5>
        <hr>
        @if(count($questions))
            @foreach($questions as $question)
                @include('question.question')
            @endforeach
        @else
            <div class="center-align">
                <i class="material-icons large">code</i>
                <h5>Još nema pitanja</h5>
            </div>
        @endif
    </div>
@endsection

@section('sidebar')
    <div class="col s12 m4 l4">
        <h5>Popularni tagovi</h5>
        <hr>
    </div>
@endsection
