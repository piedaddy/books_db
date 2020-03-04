<div> 
<h1>Book Directory</h1>
<nav>
  <a href="{{action('CartController@index')}}">Go to cart</a>
  <a href="{{action('BookExampleController@create')}}">Add a new book</a>
  <a href="{{action('CartController@empty')}}">Empty cart</a>
  <a href="{{action('GenreController@index')}}">List of genres</a>


</nav>

<h3>Seach for book</h3>
  <form action="{{action('BookExampleController@search')}}" method="post">
    @csrf 
    <input type="text" id="search" name="search">
    <input type="submit" value="search">
  </form>

  @foreach($books as $book)
    <div style="display:flex;">
      @if($book->image)
        <img src="{{$book->image}}" width="130px" height="200px" style="padding:1em 0em" alt="{{$book->title}}";>
      @endif
      @if($book->image_file)
        <img src="{{$book->image_file}}" width="100px" height="200px" style="padding:1em 0em";>
      @endif
      <div style="display:flex; flex-direction:column;padding:1em 1em;">
        <h3>{{$book->title}}</h3>
        <p> {{$book->authors}}</p>
     

        <a href="{{ action('BookExampleController@show', [$book->id]) }}">Read More!</a>
        {{-- <a href="{{ action('CartController@add', [$book->id]) }}">Add to cart</a> --}}


        <form action= "{{action('CartController@postAdd', [$book->id])}}" method="post">
          @csrf
          <input type="hidden" name="book_id" value={{$book->id}}> 
          <input type="submit" value= "Add to cart">
        </form>

      </div>
    </div>
  @endforeach  

</div>

{{-- by hidding the input the user won't see the input area and when they click the submit button it will still be added!! cooL!! --}}