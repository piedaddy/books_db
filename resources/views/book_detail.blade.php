<h3>{{$book->title}}</h3>
<img src="{{$book->image}}">
<p> {{$book->authors}}</p>

{{-- this will give whole answer as json string
{{json_encode($book)}}  --}}