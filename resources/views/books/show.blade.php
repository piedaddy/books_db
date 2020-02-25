<div> 

  <div style="display:flex;">
    <img src="{{$book->image}}" width="100px" style="padding:1em 0em";>
    <div style="display:flex; flex-direction:column;padding:1em 1em;">
      <h3>{{$book->title}}</h3>
      <p> {{$book->authors}}</p>
      <p> Published by: {{$book->publisher->title}}</p> 
      {{-- get property of publisher, and then get the title --}}
      {{-- $book=element  publisher = method delcared in Boook.php  title= part of table in publisher  --}}
      {{-- the book belongs to the publisher 
      if something1 belongs to something2, then something2 will have an id inside the something1 --}}

      <a href="{{ action('BookExampleController@index') }}">Go back to catalogue!</a>
    </div>
  </div>

</div>