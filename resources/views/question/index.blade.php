@extends('base.column')

@section('title', 'Pitajte i podijelite svoje znanje')

@section('content')
    <div class="section">
        <h5 class="sectionTitle">Aktualno</h5>
        <hr>
        @if(count($questions))
            @foreach($questions as $question)
                @include('question.partials.question')
            @endforeach
            <div class="row center">
                {{ $questions->links() }}
            </div>
        @else
            <div class="center-align">
                <i class="material-icons large">code</i>
                <h6>Još nema pitanja</h6>
            </div>
        @endif
    </div>
@endsection

@section('sidebar')
    @include('partials.popularTags')
@endsection
