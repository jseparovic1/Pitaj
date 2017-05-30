@extends('base.master')
{{--
Full page layout (no grid)
--}}
@section('header')
    @include('partials.nav')
@endsection

@section('container')
    <div class="row">
        <div class="col s8 offset-s2">
            @yield('content')
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

