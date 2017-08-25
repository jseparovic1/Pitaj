@extends('base.master')
{{--
Full page layout (no grid)
--}}
@section('header')
    @include('partials.nav')
@endsection

@section('container')
    <div class="row">
        <div class="col l8 offset-l2 s12">
            <div class="col s12">
                <div class="section center-align">
                    <h5> @yield('pageTitle')</h5>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

