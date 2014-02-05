<!DOCTYPE HTML>
<html>
<head>
	<title>{{$title}}</title>
</head>
<body>
<h2>Hi, {{ $email }}!</h2>
 
<p>You received this email because you started a procedure to reset your password</p>
<p>To reset your password follow the following link http://armancon.com/azadmin/myproject/public/auth/token/{{$token}}/{{$email}}</p>
<p>If this message was not intended for you, please disregard it</p>
</body>
</html>