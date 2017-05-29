@extends('master')

@section('title', 'Pitajte i podijelite svoje znanje')

@section('content')
    <div class="section">
        <h5 class="sectionTitle">Aktualno</h5>
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
    <div class="section">
        <h5 class="sectionTitle">Popularni tagovi</h5>
        <hr>
        <div class="col s12" id="popular_tags">
            <div class="section center-align">
                @forelse($tags as $tag)
                    <span class="badge new" data-badge-caption="">
                {{ $tag->name }}
            </span>
                @empty
                    <p>No tags yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
