<div>
  <h2>{{$publisher->title}}</h2>
  <h4>Notable books from this publisher:</h4>
  @foreach($books as $book)
  <p>{{$book->title}}</p>
  <img src="{{$book->image}}" width="100px" style="padding:1em 0em";>
  @endforeach
<br>
  <a href="{{ action('PublisherController@index') }}">Go back to list</a>
</div>