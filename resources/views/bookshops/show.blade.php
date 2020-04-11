@extends('admin.layout')
@section('content')

<nav class="index_link">
  <a href="{{action('BookshopController@index')}}">Back to directory </a> 
</nav>

<h2>Bookshop Info</h2>
<div class="container">
  <h3>{{$bookshop->name}}</h3> 
      {{$bookshop->city}}

      <h4>Book Inventory:</h4>
      @auth
      <form action="{{action('BookshopController@addBook', ['id'=> $bookshop->id])}}" method="post">
        @csrf 
        <select name="book_id" id="book_id">
          @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->title}}</option>
          @endforeach
        </select>
        <input type="number" name="count" value="0">
          <button type="submit">Add</button>
      </form> 
      @endauth

      <ol>
        @foreach($bookshop->books as $book)
        {{-- <div style="display:flex;"> --}}
          <li><h4>{{$book->title}}</h4></li>
          <p>({{$book->pivot->count}} copies)</p> 
          @can('admin')
          <form action= "{{action('BookshopController@removeBook', $bookshop->id)}}" method="post">
            @csrf
            {{-- OR CAN DO 
            <input type="hidden" name="book_id" value={{$book->id}}> --}}
            <button name="book_id" value={{$book->id}} type="submit">Delete</button> 
          </form>
          @endcan
        @endforeach
      </ol>

</div>

@endsection