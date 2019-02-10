<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Welcome patient <?php 
	session_start();
	echo $_SESSION['id'];
	?></h1>
</body>
</html>