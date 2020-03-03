<form action="/books/{{$book->id}}/edit" method="post"> <!--it is still post because we are sending it to another server, now we are sending hte data to the update method--> 
  @csrf 
  <label>Title</label>
    <input type="text" name="title" value="{{$book->title}}">
  <label>Author</label>
    <input type="text" name="author" value="{{$book->authors}}">
  <label>Image</label>
    <input type="text" name="image" value="{{$book->image}}">

  <label>Genre</label>
    <select name="genre_id">
      @foreach($genres as $genre)
       <option value="{{$genre->id}}" {{$genre->id == $book->genre->id ? "selected" : ""}}>{{$genre->name}}</option>
      @endforeach
      
  <label>Publisher</label>
  <select name= "publisher_id">
    @foreach($publishers as $publisher)
      <option value = "{{$publisher->id}}">{{$publisher->title}}</option>
    @endforeach
  </select>

  <input type="submit" value="submit">
</form>