<!DOCTYPE HTML>
<html>
<head>
	<title>Password reset</title>
</head>
<body>
<h2>Hi, {{ $email }}!</h2>
 
{{ Form::open(array("url" => "auth/token/".$token."/".$email , "method"=>"post")) }}

{{ Form::label('password', 'Password')}}<br>
{{ Form::password('password', Input::old('password')) }}<br>
{{ Form::label('rpassword', 'rPassword')}}<br>
{{ Form::password('rpassword', Input::old('password')) }}<br>
{{ Form::text('token' , $token, array('hidden' =>true)) }}<br>
{{ Form::text('email' , $email, array('hidden' =>true)) }}<br>
{{ Form::submit('Register!') }}

{{ Form::token() . Form::close() }}
</body>
</html>