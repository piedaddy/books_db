@extends('admin.layout')

@section('create')
<h1>Add a new book!</h1>
<form action="/books" method="post" enctype="multipart/form-data">
  @csrf 
  <label>Title</label>
    <input type="text" name="title"><br>
    <br>
  <label>Author</label>
    <input type="text" name="author"><br>
    <br>
  <label>Upload Image from the wild web</label>
    <input type="text" name="image"><br>
    {{-- for absolute urls pointing to the internet --}}
    <br>
    <label>Upload Image from computer</label>
    <input type="file" name="image_file"><br>
    <br>
  <label>Publisher</label>
  <select name= "publisher_id">
    @foreach($publishers as $publisher)
      <option value = "{{$publisher->id}}">{{$publisher->title}}</option>
    @endforeach
  </select><br>
  <br>
  <label>Genre</label>
  <select name="genre">
    @foreach($genres as $genre)
     <option value="{{$genre->name}}">{{$genre->name}}</option>
     @endforeach
  </select> 
  <br>

  <input type="submit" value="submit">
</form>

@endsection