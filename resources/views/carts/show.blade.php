@extends('admin.layout')

@section('cart_show')
<a href="{{action('CartController@index')}}">Back to cart</a>

<h3>{{$item->book->title}}</h3>
    <p>Published by: {{$item->book->publisher->title}}</p>
    <p>Count: {{$item->count}}</p>
    <nav>
      {{-- <a href="{{action('CartController@add', [$item->book->id])}}">Add</a> --}}
      <a href="{{action('CartController@delete', $id)}}">Delete from cart</a>

    </nav>
@endsection