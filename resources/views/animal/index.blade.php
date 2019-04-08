
@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
@include('menu')

<h1>Animals List</h1>

@foreach ($collection as $item)
    <a href="{{route('animal.edit', [$item])}}">{{$item->animal_book}} Manager:{{$item->AnimalManagerIs->name}} Specie:{{$item->AnimalSpieceIs->name}}</a>
    <form style="display:inline-block;" action="{{route('animal.destroy', [$item])}}" method="POST">
        @csrf
        <button type="submit" style="display:inline-block;border:none;background:transparent;text-decoration:underline;cursor:pointer;">TRINTI</button>
    </form> <br>
@endforeach
</div></div></div>
@endsection('content')