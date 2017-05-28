@extends('master')

@section('title', $question->title)

@section('content')
    <div class="col s12 m4 l8">
        <h5>Aktualno</h5>
        <hr>
        <div class="card-panel z-depth-1 lighten-5">
            <i>
                <i class="tiny material-icons">person_pin</i>
                {{ $question->author()->first()->name }} on
                {{ $question->createdForHuman() }}
            </i>
            <blockquote>
                <a href="{{ route('question.single', ['id' => $question->id , 'slug' => $question->slug]) }}">
                    {{ $question->title }}
                </a>
            </blockquote>
            <div class="row" id="tags">
                <div class="col">
                    @foreach( $question->tags as $tag )
                        <span class="new badge">
                    {{ $tag->name }}
                </span>
                    @endforeach
                </div>
            </div>
            <div id="row">
                <div class="col">
                    <span> <i class="tiny material-icons">pageview</i> <span>{{ $question->views }}</span></span>
                    <span> | Answers </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <div class="col s12 m4 l4">
        <h5>Povezana pitanja</h5>
        <hr>
    </div>
@endsection
