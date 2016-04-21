
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
    {!! Form::open(array('route' => 'posts.store', 'class' => 'test')) !!}
     {{ Form::label('title', 'Title: ', 'class' => 'test') }}
    {{ Form::text('title', null) }}
     {{ Form::label('posttext', "Post Text: " , 'class' => 'test') }}
     {{ Form::textarea('ptext', null , 'class' => 'test') }}
     {{ Form::submit('Create New Post' , 'class' => 'test') }}
{!! Form::close() !!}
</div>
</head>
</body>
</html>
