<div>
  @foreach($genres as $genre) 
  <h2>{{$genre->name}}</h2>
  <nav>
    <a href="{{action('GenreController@show', [$genre->id])}}">Learn more</a>
  </nav>
  @endforeach
</div>