<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Welcome doctor <?php 
	session_start();
	echo $_SESSION['id']."<br>";

	
	?></h1>
</body>
</html>