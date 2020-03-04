<div>
  <a href="{{action('BookExampleController@index')}}">Back to directory</a>
  <a href="{{action('GenreController@create')}}">Add a new genre</a>


  @foreach($genres as $genre) 
  <h2>{{$genre->name}}</h2>
  <nav>
    <a href="{{action('GenreController@show', [$genre->id])}}">Learn more</a>
  </nav>
  @endforeach
</div>