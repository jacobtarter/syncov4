
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
<p id="login"></p>
<div class = "commentMain"> {!! Form::open(array('route' => 'posts.store')) !!}</div>
    <div class = "commentTitle" > {{ Form::label('title', 'Title: ') }} </div>
    {{ Form::text('title', null) }}
    {{ Form::label('posttext', "Post Text: ") }}
    {{ Form::textarea('ptext', null) }}
    {{ Form::submit('Create New Post') }}
{!! Form::close() !!}

</head>
</body>
</html>
