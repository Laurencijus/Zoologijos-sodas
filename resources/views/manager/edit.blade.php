@include('menu')
<h1>Manager Edit</h1>
<form action="{{route('manager.update', [$manager])}}" method="POST">
    <input type="text" name="name" value="{{old('name', $manager->name)}}">
    <input type="text" name="surname" value="{{old('surname', $manager->surname)}}">
    <select name="specie_id">
        @foreach ($collection as $item)
            <option value="{{$item->id}}" @if($item->id == $manager->specie_id) selected @endif>{{$item->name}}</option>
        @endforeach
    </select>
    
    <button type="submit">Edit it!</button>
    @csrf
</form>

  <hr />