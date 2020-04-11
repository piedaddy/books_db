@extends('admin.layout')
@section('index')

  <h2>List of Bookshops</h2>

  <nav>
    <a href="{{action('BookshopController@create')}}">Create a new bookshop</a>
    <a href="{{action('BookExampleController@index')}}">Go to book directory</a>

  </nav>
  <br>

  @if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
  @endif

  <div class="bookshop-list">
    <ol>
      @foreach($bookshops as $bookshop)
        <li><h3>{{$bookshop->name}}</h3></li>
        {{$bookshop->city}}
        <nav class="shop_link">
          <a href="{{action('BookshopController@show', ['id'=>$bookshop->id])}}">Learn more </a> 
        </nav>
        <hr>
      @endforeach
    </ol>

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