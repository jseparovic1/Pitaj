@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="card-panel materialize-red" style="color: white">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif