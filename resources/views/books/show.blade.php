@extends('admin.layout')

@section('books_index')

<div> 

  <div style="display:flex;">
    @if($book->image)
      <img src="{{$book->image}}" width="180px" height="300px" style="padding:1em 0em";>
    @endif

    @if($book->image_file)
      <img src="{{$book->image_file}}" width="180px" height="300px" style="padding:1em 0em";>
    @endif

    <div style="display:flex; flex-direction:column;padding:1em 1em;">
      <h3>{{$book->title}}</h3>
      <p> Author(s): {{$book->authors}}</p>
      {{-- <p> Published by: {{$book->publisher->title}}</p>  --}}
      <p> Published by: {{$book->publisher ? $book->publisher->title : 'Unknown publisher'}}</p> 

      {{-- @if($book->genre)
      <p> Genre: {{$book->genre ? $book->genre->name :  'this book has not been categorized into genre yet'}}</p> 
      @endif  --}}
      Genre(s): 
      @foreach($book->genres as $genre)
      <ul>
        <li>{{$genre->name}}</li>
      </ul>
      @endforeach
     
@auth
      <div class="bookshop-book-list">
      <strong>Sold at the following bookshops:</strong>
      <ol>
        @foreach($book->bookshops as $bookshop)
        <li>{{$bookshop->name}}</li>
        @endforeach
      </ol>
    </div>
@endauth

        <p>Reviews: <br>
        @if(($book->reviews)->count() == 0)
        There are no reviews currently for this book</p>
        @endif 
          @foreach($book->reviews as $review) 
          {{-- @foreach($book->reviews()->latest()->get() as $review)  --}}
          {{-- @foreach($book->reviews()->orderBy('created_at', 'asc')->get() as $review)  --}}

          {{-- //this makes sense because it is putting a query together, select everything from reviews where books exists, and then it takes all the review objects and then sets it as $reviews, so then we can access their values as $review  --}}

          {{-- // because i defined a relationship between book and review i can jsut select it from the books --}}
            <div class="reviews">
              <strong>{{$review->review}}</strong><br>
              <p>Written by: {{$review->user->name}}</p>

              @can('admin')
              <form action="{{action('ReviewController@delete', $review->id) }}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="delete">
              </form>
              @endcan
            </div>
          @endforeach 
         
@guest
   <h4>please <a href="{{action('Auth\LoginController@showLoginForm')}}">login</a> to leave a review</h4>
   {{--ANOTHER WAY
     <h4>please <a href="{{route('login')}}">login</a> to leave a review</h4> 
    --}}
@endguest


          {{-- <p>{{$book->reviews->review->name == null ? 'Be the first!' : 'Add a review'}}</p> --}}
  


    @auth
  {{-- this just means "if auth is checked" therefore this is an IF, so we can use else statmenets inside --}}
        <p>Add a review</p>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      @if(Session::has('success_message'))
          <div class="alert alert-success">
              {{ Session::get('success_message') }}
          </div>
        @endif

        <form action="{{action('BookExampleController@review', ['id'=> $book->id])}}" method="post"> 
          {{-- <form action="{{action('BookExampleController@review', $book->id)}}" method="post">
            //i could also send just the value if there is only one parameter  --}}

          @csrf
          <textarea name="review" rows="3" cols="30" placeholder="Write your review here">{{old('review')}}</textarea>
          <br>
          {{-- <input type="text" name="name" value= "{{old('name')}}" placeholder="Your Name">
          <br>
          <input type="email" name="email" value= "{{old('email')}}" placeholder="Your Email"> --}}
          <input type="text" name="name" disabled value= "{{Auth::user()->name}}" placeholder="Your Name">
          <br>
          <input type="email" name="email" disabled value= "{{Auth::user()->email}}" placeholder="Your Email">
          <br>
          <input type="submit" value="submit review">
        </form>
  @endauth

  @can('admin')
  <h3>Related Books:</h3>
  <ol>
  @foreach($book->relbooks as $b)
    <div class="related-books">
       <li> <h5>{{$b->title}}</h5></li>
        <form action="{{action('BookExampleController@removeRelatedBook', $book->id)}} " method="post">
          @csrf
          <input type="hidden" value="{{$b->id}}">
          <input type="submit" value="delete">
        </form>
      </div>
  @endforeach
  </ol>
  <form action ="{{action('BookExampleController@addRelatedBook', $book->id)}}" method="post">
    @csrf
    <select name="related_book">
      @foreach($relBook as $book)
      <option value ="{{$book->id}}">{{$book->title}}</option>
      @endforeach
    </select>
    <input type="submit">
  </form> 
  @endcan

  <a href="{{action('BookExampleController@edit', ['id' => $book->id])}}" >Add Genre</a>

      <a href="{{ action('BookExampleController@index') }}">Go back to catalogue!</a>

      <form action= "{{action('CartController@postAdd', [$book->id])}}" method="post">
        @csrf
        <input type="hidden" name="book_id" value={{$book->id}}> 
        <input type="submit" value= "Add to cart">
      </form>

    </div>

  </div>

  <nav class="delete">
    <a href="{{action('BookExampleController@delete', $id)}}">Delete this book</a>
  </nav>
</div>

@endsection