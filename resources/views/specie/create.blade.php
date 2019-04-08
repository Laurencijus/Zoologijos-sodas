@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
@include('menu')
<h1>Species</h1>

<form action="{{route('specie.store')}}" method="POST">
<input type="text" name="species_type" value="{{old('species_type', '')}}">
<button type="submit">Add it!</button>
 @csrf
</form>
</div></div></div>
@endsection('content')
