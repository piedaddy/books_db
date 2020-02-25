<div> 

  <div style="display:flex;">
    <img src="{{$book->image}}" width="100px" style="padding:1em 0em";>
    <div style="display:flex; flex-direction:column;padding:1em 1em;">
      <h3>{{$book->title}}</h3>
      <p> {{$book->authors}}</p>
      <a href="{{ action('BookExampleController@index') }}">Go back to catalogue!</a>
    </div>
  </div>

</div>