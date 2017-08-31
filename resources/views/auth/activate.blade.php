@extends('base.full')

@section('title', 'Prijava')
@section('pageTitle', 'Aktivacija')

@section('content')
    <div class="row">
        <div class="col s12">
            <p>Poštovani <b>{{ $name }}</b>, aktivacijski email poslan je na vašu adresu {{ $email }}.</p>
            <p>Potrebno je aktivirati račun klikom na dugme potvrdi za nastavak.</p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center">
            Za <b><span id="counter">10</span></b> sekundi automatski ce te biti preusmjereni na <a href="{{ route('home') }}">naslovnicu</a>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML) < 2) {
            location.href = '/';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },500);
</script>