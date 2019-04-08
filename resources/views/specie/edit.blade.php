@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
@include('menu')
<h1>Manager Edit</h1>
<form action="{{route('manager.update', [$manager])}}" method="POST">
    <input type="text" name="managers_type" value="{{old('managers_type', $manager->name)}}">
    <button type="submit">Redaguoti!</button>
    @csrf
</form>
</div></div></div>
@endsection('content')

  <hr />
