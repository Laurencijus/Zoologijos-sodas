<a href="{{route('specie.index')}}">Species List</a>
<a href="{{route('specie.create')}}">New Specie</a>
<a href="{{route('manager.index')}}">Managers List</a>
<a href="{{route('manager.create')}}">New Manager</a>
<a href="{{route('animal.index')}}">Animals List</a>
<a href="{{route('animal.create')}}">New Animal</a>

@if(session()->has('success_message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
    </div>
@endif

@if(session()->has('info_message'))
    <div class="alert alert-info" role="alert">
        {{session()->get('info_message')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif