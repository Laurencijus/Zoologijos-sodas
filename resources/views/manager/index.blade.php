@extends ('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
@include('menu')
<h1>Managers List</h1>
{{-- Begemotai:{{$begemotai}} <br> --}}
BEGEMOTus priziuri: 
@foreach($begemotai as $item)
{{$item->name}} {{$item->surname}}<br>
@endforeach

@foreach ($collection as $item)
<a href="{{route('manager.edit', [$item])}}">{{$item->name}} {{$item->surname}} priziuri {{$item->ManagerSpieceIs->name}}</a>
  
    <form style="display:inline-block;" action="{{route('specie.destroy', [$item])}}" method="POST">
        @csrf
        <button type="submit" style="display:inline-block;border:none;background:transparent;text-decoration:underline;cursor:pointer;">TRINTI</button>
    </form> <br>
@endforeach
</div></div></div>
@endsection('content')