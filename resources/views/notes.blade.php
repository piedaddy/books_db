<h1>Hiii</h1>

<?php echo "Hello, ". $user . " "  . $surname . " from php"; ?>

<?php
<p> HEllo, {{$user}} {{$surname}}</p>
// only works with blade

<p>hello, <?php echo $user;?></p>

<p>hello, <?php echo htmlspecialchars($comment);?></p> // this is making it so that everything is written just as html, so nobody can interject unwanted stuff
// kinda the same thing as using 
{{$comment}}

<p> {{$comment}} // string will be escaped and echoed // telling the browser that it is not special characters and shouldn't be treated as such, for any character that has special menaing they get replaced with special characters
<p> {{!!$comment!!}}  // string does not get escaped !! string will turned into regular html elements// dont use this one as much 

// safer comments are blade comments 
{{-- COMMENT --}}
//and now it wont be in the html source code
// todo: is special tag that is like a todo list, so we can easily look at our files and see what has a todo comment
//every blade keyword starts with @
@if($age>=18) 
  //code
  @else 
  // code 
@endif