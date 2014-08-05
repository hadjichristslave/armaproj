<!DOCTYPE HTML>
<html>
<head>
	<title>{{$title}}</title>
</head>
<body>
<h2>Γειά σου, {{ $name }}!</h2>
 
<p>Μια νέα παραγγελία με κωδικό {{$id}} έχει τεθεί σε κατάσταση αναμονής λογιστιρίου</p>
<p>Για να δείτε την παραγγελία παρακαλώ επισκευτείτε το http://armancon.com/azadmin/myproject/public/app/data/Order/display/{{$id}}</p>
<p>Εάν έχετε ήδη δεχτεί email επιβεβαίωσης της παραγγελίας αυτής, παρακαλώ παραβλέψτε αυτό το email.</p>
</body>
</html>