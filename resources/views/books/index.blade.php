<div> 

  @foreach($books as $book)
    <div style="display:flex;">
        <img src="{{$book->image}}" width="100px" style="padding:1em 0em" alt="{{$book->titlle}}";>
      <div style="display:flex; flex-direction:column;padding:1em 1em;">
        <h3>{{$book->title}}</h3>
        <p> {{$book->authors}}</p>
        <a href="{{ action('BookExampleController@show', [$book->id]) }}">Read More!</a>
        <a href="{{ action('CartController@add', [$book->id]) }}">Add to cart</a>

      </div>
    </div>
  @endforeach  

</div>