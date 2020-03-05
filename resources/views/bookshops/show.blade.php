@extends('admin.layout')
@section('content')

<nav class="index_link">
  <a href="{{action('BookshopController@index')}}">Back to directory </a> 
</nav>

<h2>Bookshop Info</h2>
<div class="container">
  <h3>{{$bookshop->name}}</h3> 
      {{$bookshop->city}}

      <h4>Books:</h4>
      <form action="{{action('BookshopController@addBook', ['id'=> $bookshop->id])}}" method="post">
        @csrf 
        <select name="book_id" id="book_id">
          @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->title}}</option>
          @endforeach
        </select>
          <button type="submit">Add</button>
      </form> 
</div>

@endsection