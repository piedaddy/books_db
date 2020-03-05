@extends('admin.layout')

@section('genre_show')
<div>
  <h2>{{$genre->name}}</h2>
  <p>Popular books of this genre: </p>

    @foreach($genre->books as $book)
      <p>{{$book->title}}</p>
      @if($book->image)
        <img src="{{$book->image}}" width="100px" style="padding:1em 0em";>
      @endif
      @if($book->image_file)
        <img src="{{$book->image_file}}" width="100px" style="padding:1em 0em";>
      @endif

    @endforeach

    <a href="{{action('GenreController@index')}}">back to list</a>
</div>
@endsection