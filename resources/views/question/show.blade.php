@extends('base.column')

@section('title', $question->title)

{{-- Show single question --}}
@section('content')
    <div class="section">
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
            @each('question.partials.answers' , $answers, 'answer')
        @else
            <div class="section center-align">
                <i class="material-icons large">mode_edit</i>
                <h5>Još nema odgovora</h5>
            </div>
        @endif
        {{-- include answer from --}}
        @include('question.partials.answerForm')
    </div>
@endsection

@section('sidebar')
    <div class="section">
        <div class="row">
            <h5 class="side-title">Povezano</h5>
            <div class="col">
                @foreach($related as $q)
                    <a href="{{ route('question.single',['id' => $q->id])  }}"> {{$q->title}} </a>
                @endforeach
            </div>
        </div>
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
