@extends('admin.layout')
@section('index')
<a href="{{ action('BookExampleController@index') }}">Go back to book catalogue!</a>

<h1>Publishers</h1>
<hr>
 @foreach($publishers as $publisher)
    <h2>{{$publisher->title}}</h2>
    <a href="{{ action('PublisherController@show', [$publisher->id]) }}" >Click to learn more about this company</a>
  @endforeach
