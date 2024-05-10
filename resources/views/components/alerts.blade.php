@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-error text-red-600">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif

@if (session()->has('message'))
    <div class="alert-success text-green-600">
        {{ session('message') }}
    </div>
@endif
