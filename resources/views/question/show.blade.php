@extends('base.column')

@section('title', $question->title)

{{-- Show single question --}}
@section('content')
    <div class="section">
        <div class="card-panel">
            <header class="section" id="questionTitle">
                <h5  style="max-width: 600px;word-break: break-word">{{ $question->title }}</h5>
                <i>
                    {{ $question->author->name }}
                    {{ $question->author->lastName }}
                    {{ $question->createdForHuman() }}
                </i>
                <div class="divider"></div>
            </header>
            <main>
                <section id="questionContent" data-id="{{ $question->id }}">
                    <p>{!! $question->body !!}</p>
                </section>
                <div class="input-field col s12">
                    <textarea id="questionEdit" class="materialize-textarea" style="display: none;"></textarea>
                </div>
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
                        <div class="section ">
                            <div class="row">
                                <button id="btn-edit" class="btn-flat btn-control">
                                    <i class="material-icons">edit</i>
                                </button>
                                <form method="POST" action="{{ route('question.destroy',['question' => $question->id ]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button id="btn-delete" class="btn-flat">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan
            </main>
        </div>
    </div>
    {{-- Answers area --}}
    <div class="section" id="answers">
        @if(count($answers = $question->answers->sortByDesc('score')) > 0)
            <h6>Komentara <span style="color:red; font-weight: 600">{{ count($answers) }}</span></h6>
            @each('answer.answers' , $answers, 'answer')
        @else
            <div class="section center-align">
                <i class="material-icons large">mode_edit</i>
                <h5>Još nema odgovora</h5>
            </div>
        @endif
        @include('answer.answerForm')
    </div>
@endsection

@section('sidebar')
    <div class="section">
        <div class="row">
            <h5 class="side-title">Povezano</h5>
            <div class="col">
                <ul class="collection">
                    @foreach($related as $q)
                            <li class="collection-item" style="max-width: 300px;word-break: break-word">
                                <a href="{{ route('question.single',['id' => $q->id])  }}"> {{$q->title}} </a>
                            </li>
                    @endforeach
                </ul>
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
