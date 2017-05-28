@extends('master')

@section('title', $question->title)

@section('content')
    <div class="card-panel col s12 m8 l8">
        <header class="section" id="questionTitle">
            <h5 class="h1"> {{ $question->title }}</h5>
            <i>
                {{ $question->author->name }}
                {{ $question->author->lastName }}
                {{ $question->createdForHuman() }}
            </i>
            <div class="divider"></div>
        </header>
        <main id="questionContent">
            <section>
                <p>Question body text here</p>
            </section>
            <section class="section" id="tags">
                @foreach( $question->tags as $tag )
                    <div class="chip">
                        {{ $tag->name }}
                    </div>
                @endforeach
            </section>
        </main>
    </div>
    {{-- Answers area --}}
    <div class="col s12 m8 l8">
        @if(count($answers = $question->answers()->get()) > 0)
            <h6>Komentara <span style="color:red; font-weight: 600">8</span></h6>
            {{--Display all answers--}}
            @each('question.answers' , $answers, 'answer')
        @else
            <h6>No comments yet</h6>
        @endif
    </div>

@endsection

@section('sidebar')
    <div class="col s12 m4 l4">
        <h5>Povezano</h5>
        <div class="section">
            <h5>Stats</h5>
            <div id="row">
                <div class="col">
                    <span> <i class="tiny material-icons">pageview</i> <span>{{ $question->views }}</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection
