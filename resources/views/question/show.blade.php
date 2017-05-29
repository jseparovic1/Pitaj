@extends('master')

@section('title', $question->title)

@section('content')
    {{-- Show single question --}}
    <div class="card-panel">
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
    <div class="section" id="answers">
        @if(count($answers = $question->answers->sortBy('votes', 1 , true)) > 0)
            <h6>Komentara
                <span style="color:red; font-weight: 600">
                    {{ count($answers) }}
                </span>
            </h6>
            {{-- Display all answers --}}
            @each('question.answers' , $answers, 'answer')
        @else
            <div class="section center-align">
                <i class="material-icons large">mode_edit</i>
                <h5>Još nema odgovora</h5>
            </div>
        @endif
        {{-- include answer from --}}
        @include('question.answerForm')
    </div>
@endsection

@section('sidebar')
    <div class="section">
        <h5 class="side-title">Povezano</h5>
        <div class="section">
            <h5 class="side-title">Statistika</h5>
            <div id="row">
                <div class="col">
                    <span> <i class="tiny material-icons">visibility</i> <span>{{ $question->views }}</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection
