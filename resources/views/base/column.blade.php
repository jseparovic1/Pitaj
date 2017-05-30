{{-- 2 COLUMNS LAYOUT --}}
@extends('base.master')

@section('header')
    @include('partials.nav')s
@endsection

@section('container')
    <div class="row">
        <div class="col s8 m8 l8">
            @yield('content')
        </div>
        <div class="col s4 m4 l4">
            @yield('sidebar')
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

