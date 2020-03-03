<div>
  <h2>{{$genre->name}}</h2>
  <p>Popular books of this genre: </p>

    @foreach($books as $book)
      <p>{{$book->title}}</p>
      <img src="{{$book->image}}" width="100px" style="padding:1em 0em";>
    @endforeach
    <a href="{{action('GenreController@index')}}">back to list</a>
</div>
