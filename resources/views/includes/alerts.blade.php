@if ($errors->any())
    <div class="alert alert-warning" role="alert">
            @foreach($errors->all() as $error )
                <p>{{$error}}</p>
            @endforeach
    </div>
@endif
@if(isset($msg) and $errors->any() <> 'empty' )
    <div class="alert alert-{{$msg[1]}} text-center " role="alert">
    <p>{{$msg[0]}}</p>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
                <p>{{ session('error') }}</p>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success" role="alert">
                <p>{{ session('success') }}</p>
    </div>
@endif

{{-- {{\Session::get('msg')}} --}}