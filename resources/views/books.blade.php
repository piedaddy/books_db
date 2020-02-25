@foreach($books as $book) 
   <h3>{{$book->title}}</h3>
   <img src="{{$book->image}}">
   <p> {{$book->authors}}</p>
@endforeach


{{--or could do --}}

@foreach($books as $book)
  @include('book_detail') {{--and now it will render this view by using the info in book_detail.blade.php--}}
@endforeach



