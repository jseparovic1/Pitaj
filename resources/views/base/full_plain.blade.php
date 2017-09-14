@extends('base.master')
{{--
Full page layout (no grid)
--}}
@section('header')
    @include('partials.nav')
@endsection

@section('container')
     @yield('content')
@endsection

@section('footer')
    @include('partials.footer')
@endsection

