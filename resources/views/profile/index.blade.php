@extends('base.full_plain')

@section('title', $profile->userName())

{{-- Show single question --}}
@section('content')
    <div class="row">
        <div class="section center-align" id="profileInfo">
            <div class="col s6 m6 l6">
                <h4 class="h3">{{ $profile->userName() }}</h4>
                <div>{{ $profile->description() }}</div>
            </div>
            <div class="col s6 m6 l6">
                <div class="avatar">
                    <img src="{{ $profile->user()->avatarUrl }}" alt="" class="circle">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="collection with-header">
                <div class="collection-header"><h4>Odgovori</h4></div>
                @foreach($profile->answers() as $a)
                    <a href="{{ route('question.single', ['id' => $a->question->id]) }}" class="collection-item">{{ $a->body }}</a>
                @endforeach
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="collection with-header">
                <div class="collection-header"><h4>Pitanja</h4></div>
                @foreach($profile->questions() as $q)
                    <a href="{{ route('question.single', ['id' => $q->id]) }}" class="collection-item">{{ $q->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection