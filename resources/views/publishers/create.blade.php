@extends('admin.layout')

@section('create')

<form action="/publishers" method="post">
  @csrf 
  <input type="text" name="title">
  <input type="submit" value="submit">
</form>


