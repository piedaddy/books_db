<div> 

  @foreach($books as $book)
    <div style="display:flex;">
        <img src="{{$book->image}}" width="100px" height="200px" style="padding:1em 0em" alt="{{$book->titlle}}";>
      <div style="display:flex; flex-direction:column;padding:1em 1em;">
        <h3>{{$book->title}}</h3>
        <p> {{$book->authors}}</p>
        <p> Genre(s): </p>

        <a href="{{ action('BookExampleController@show', [$book->id]) }}">Read More!</a>
        <a href="{{ action('CartController@add', [$book->id]) }}">Add to cart</a>

        <form action= "/cart/add" method="post">
          @csrf
          <input type="hidden" name="book_id" value={{$book->id}}> 
          <input type="submit" value= "Add to cart">
        </form>

      </div>
    </div>
  @endforeach  

</div>

{{-- by hidding the input the user won't see the input area and when they click the submit button it will still be added!! cooL!! --}}