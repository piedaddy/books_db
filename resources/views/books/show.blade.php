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

      <p> Genre: {{$book->genre ? $book->genre->name :  'this book has not been categorized into genre yet'}}
      </p>  

      {{-- get property of publisher, and then get the title --}}
      {{-- $book=element  publisher = method delcared in Boook.php  title= part of table in publisher  --}}
      {{-- the book belongs to the publisher 
      if something1 belongs to something2, then something2 will have an id inside the something1 --}}

      <p>Reviews:
        @foreach($book->reviews as $review) 
        {{-- @foreach($book->reviews()->latest()->get() as $review)  --}}
        {{-- @foreach($book->reviews()->orderBy('created_at', 'asc')->get() as $review)  --}}

        {{-- //this makes sense because it is putting a query together, select everything from reviews where books exists, and then it takes all the review objects and then sets it as $reviews, so then we can access their values as $review  --}}

        {{-- // because i defined a relationship between book and review i can jsut select it from the books --}}
          <div class="reviews">
            <strong>{{$review->review}}</strong><br>
            <p>Written by: {{$review->name}}</p>
          </div>
        @endforeach 


      <p>Add a review:</p>

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
          <textarea name="review" rows="10" cols="70" placeholder="Write your review here">{{old('review')}}</textarea>
          <br>
          <input type="text" name="name" value= "{{old('name')}}" placeholder="Your Name">
          <br>
          <input type="email" name="email" value= "{{old('email')}}" placeholder="Your Email">
          <br>
          <input type="submit" value="submit review">
        </form>

      <a href="{{ action('BookExampleController@index') }}">Go back to catalogue!</a>
    </div>

  </div>

  <nav class="delete">
    <a href="{{action('BookExampleController@delete', $id)}}">Delete this book</a>
  </nav>
</div>