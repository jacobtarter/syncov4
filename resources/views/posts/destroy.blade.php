<!DOCTYPE html>

<html>
<head>
<body>

<p style="font-size: 24px"><b>Post New Comment!</b></p>
<script>
$user = Auth::user();
if($user)
{
document.getElementById("login").innerHTML = "Hello $user->name";
}
</script>
<p id="login"></p>
{!! Form::open(array('route' => 'posts.destroy')) !!}
    {{ Form::label('pid', 'pid: ') }}
    {{ Form::text('pid', null) }}
    {{ Form::submit('Delete Post') }}
{!! Form::close() !!}

</head>
</body>
</html>

