@extends('admin.layout')

@section('index')
<div>
  <h2>Cart</h2>
  <nav>
    <a href="{{action('BookExampleController@index')}}">Back to directory</a>
    <a href="{{action('CartController@empty')}}">Empty cart</a>
  </nav>
  @foreach($items as $item)
    <h3>{{$item->book->title}}</h3>
    <p>Published by: {{$item->book->publisher->title}}</p>
    <p>Count: {{$item->count}}</p>
    <nav>
      <a href="{{action('CartController@show', [$item->id])}}">Edit</a> 
    </nav>
  @endforeach
</div> 


{{-- 
     {{$book->publisher->title}}
     this works becuase their relationship has been established already 
--}}

@endsection