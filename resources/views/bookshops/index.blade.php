@extends('admin.layout')
@section('content')

  <h2>List of Bookshops</h2>

  <nav>
    <a href="{{action('BookshopController@create')}}">Create a new bookshop</a>
  </nav>
  <br>

  @if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
  @endif

  <div class="bookshop-list">
  {{-- @foreach($bookshops as $bookshop)
    <h3>Bookshop name:</h3> {{$bookshop->name}}
    <h3>Located in: </h3> {{$bookshop->city}}
    <hr>
  @endforeach --}}
  @foreach($bookshops as $bookshop)
  <h3>{{$bookshop->name}}</h3> 
  {{$bookshop->city}}
  <nav class="shop_link">
    {{-- <a href="{{action('BookshopController@show', ['id'=>$id])}}">Learn more </a> --}}
  </nav>
    <hr>
@endforeach
  {{-- <table>
      <tr class="table_headers">
        <th>Bookshop Name</th>
        <th>Located in</th>    
      </tr> 
    <tbody class="bookshop_data">
    @foreach($bookshops as $bookshop)
      <tr>
        <td>{{$bookshop->name}}</td>
        <td>{{$bookshop->city}}</td>
      </tr>
    @endforeach
    </tbody>
  </table> --}}
  </div>
@endsection