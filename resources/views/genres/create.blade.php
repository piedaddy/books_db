@extends('admin.layout')

@section('create')
<form action="{{action('GenreController@store')}}" method="post">
  @csrf 
  <label>Genre Type</label>
    <input type="text" name="name">

  <input type="submit" value="submit">
</form>

@endsection