@if(Session::has('activated'))
    <script>
        Materialize.toast('Vaš račun je uspješno aktiviran', 3000, 'success')
    </script>
@endif
@if(Session::has('authenticated'))
    <script>
        Materialize.toast('Dobrodošli!', 3000, 'success')
    </script>
@endif