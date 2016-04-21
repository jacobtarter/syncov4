
<!DOCTYPE html>

<html>
<head>
<body>

<link href="{{ asset('SyncoCss1.3.css') }}" rel="stylesheet" type="text/css" >

<p style="font-size: 24px"><b>Post New Comment!</b></p>
<!--<script>
$user = Auth::user();
if($user)
{
document.getElementById("login").innerHTML = "Hello $user->name";
}
</script> -->
<h1> Test </h1>
<div class = "commentTitleForm" >
<p id="login"></p>
  {!! Form::open(array('route' => 'posts.store', 'style' => 'test')) !!}
    {{ Form::label('title', 'Title: ') }}
    {{ Form::text('title', null) }}
    {{ Form::label('posttext', "Post Text: ") }}
    {{ Form::textarea('ptext', null) }}
    {{ Form::submit('Create New Post', array('class'=>'btn btn-primary')) }}

{!! Form::close() !!}
</div>
</head>
</body>
</html>
