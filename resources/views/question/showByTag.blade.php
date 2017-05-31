@extends('base.column')

@section('title', "Najnovija $tagName pitanja")

@section('content')
    <div class="section">
        <h5 class="sectionTitle">Pitanja sa {{ $tagName }} tagom</h5>
        <hr>
        @if(count($questions))
            @foreach($questions as $question)
                @include('question.partials.question')
            @endforeach
        @else
            <div class="center-align">
                <i class="material-icons large">code</i>
                <h6>Pitanja sa {{ $tagName}} ne postoje!</h6>
            </div>
        @endif
    </div>
@endsection

@section('sidebar')

@endsection
