@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
@include('menu')
<h1>New Animal</h1>

<form action="{{route('animal.store')}}" method="POST">
    <input type="text" name="birth_year" value="{{old('birth_year', '')}}"><br><br>
    <textarea name="animal_book">{{old('animal_book', '')}}</textarea><br><br>
    <select name="specie_id" id="specie_id">
        <option> </option>
        @foreach($collection_s as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select><br><br>


    <select name="manager_id" id="manager_id" style="display:none">
        @foreach($collection_m as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select><br><br>



    <button type="submit">Add it!</button>
    @csrf
</form>
</div></div></div>
@endsection('content')