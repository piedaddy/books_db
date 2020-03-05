@extends('admin.layout')
@section('create')

<h2>create a new bookshop</h2>
<nav>
  <a href="{{action('BookshopController@index')}}">Back to bookshop list</a>
</nav>
<br>

@if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<form action="{{action('BookshopController@update')}}" method="post">
  @csrf 
  <label>Name</label>
    <input type="text" name="name" value="{{old('name')}}">
  <label>City</label>
    <input type="text" name="city" value="{{old('name')}}">
  <input type="submit" value="submit">
</form>

@endsection