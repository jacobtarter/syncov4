
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
    {!! Form::open(array('route' => 'posts.store')) !!}
    <div class = "commentTitleForm" > {{ Form::label('title', 'Title: ') }}
    {{ Form::text('title', null) }} </div>
    <div> {{ Form::label('posttext', "Post Text: ") }} </div>
    <div> {{ Form::textarea('ptext', null) }} </div>
    <div> {{ Form::submit('Create New Post') }} </div>
{!! Form::close() !!}

</head>
</body>
</html>
