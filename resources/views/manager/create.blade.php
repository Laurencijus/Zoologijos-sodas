@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
 @include('menu') 
<h1>Managers</h1>

<form action="{{route('manager.store')}}" method="POST">
<input type="text" name="name" value="{{old('name', '')}}">
<input type="text" name="surname" value="{{old('surname', '')}}">

<select name="specie_id">
    @foreach($collection as $item)
<option value="{{$item->id}}">{{$item->name}}</option>
@endforeach
</select>

<button type="submit">Add it!</button> 
 @csrf
</form>
</div></div></div>
@endsection('content')