<form action="/books" method="post">
  @csrf 
  <label>Title</label>
    <input type="text" name="title">
  <label>Author</label>
    <input type="text" name="author">
  <label>Image</label>
    <input type="text" name="image">

  <label>Publisher</label>
  <select name= "publisher_id">
    @foreach($publishers as $publisher)
      <option value = "{{$publisher->id}}">{{$publisher->title}}</option>
    @endforeach
  </select>

  <input type="submit" value="submit">
</form>