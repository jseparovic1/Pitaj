@extends('base.master')

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
                <h6>Još nema pitanja</h6>
            </div>
        @endif
    </div>
@endsection

@section('sidebar')
    <div class="section">
        <h5 class="sectionTitle">Popularno</h5>
        <hr>
        <div class="col s12" id="popular_tags">
            <div class="section center-align">
                @forelse($popularTags as $tag)
                    <div class="tagPopular" id="{{ $tag->id }}">
                        {{ $tag->name }}
                    </div>
                @empty
                    <p>Nema tagova još</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
