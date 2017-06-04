@extends('base.column')

@section('title', $question->title)

{{-- Show single question --}}
@section('content')
    <question inline-component>
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
                        <p>{{ $question->body }}</p>
                    </section>
                    <section class="section" id="tags">
                        @foreach( $question->tags as $tag )
                            <div class="chip chipTag">
                                <a href="{{ route('tag.show', ['tag' => $tag->name]) }}">
                                    {{ $tag->name }}
                                </a>
                            </div>
                        @endforeach
                    </section>
                    @can('update', $question)
                        <div class="row" id="question-controls">
                            <div class="col s3">
                                <button class="btn-flat" style="float:left" type="submit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <form method="POST" action="{{ route('question.destroy',['question' => $question->id ]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn-flat" type="submit">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endcan
                </main>
            </div>
        </div>
    </question>


    {{-- Answers area --}}
    <div class="section" id="answers">
        @if(count($answers = $question->answers->sortBy('votes', 1 , true)) > 0)
            <h6>Komentara
                <span style="color:red; font-weight: 600">
                    {{ count($answers) }}
                </span>
            </h6>
            {{-- Display all answers --}}
            @each('answer.answers' , $answers, 'answer')
        @else
            <div class="section center-align">
                <i class="material-icons large">mode_edit</i>
                <h5>Još nema odgovora</h5>
            </div>
        @endif
        {{-- include answer from --}}
        @include('answer.answerForm')
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
    </div>
    <div class="section">
        <div id="row">
            <h5 class="side-title">Statistika</h5>
            <div class="col">
                <span> <i class="tiny material-icons">visibility</i> <span>{{ $question->views }}</span></span>
            </div>
        </div>
    </div>
@endsection
