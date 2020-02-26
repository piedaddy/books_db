<div>
  <h2>Cart</h2>
  @foreach($items as $item)
    <h3>{{$item->book->title}}</h3>
    <p>Published by: {{$item->book->publisher->title}}</p>
    <p>Count: {{$item->count}} books</p>
  @endforeach
</div> 


{{-- 
     {{$book->publisher->title}}
     this works becuase their relationship has been established already 
--}}