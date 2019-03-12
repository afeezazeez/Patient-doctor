<?php
  $con=mysqli_connect('localhost','root','','infantry');

  
  if (isset($_POST['sender_id'])) {
  	$sender_id=$_POST['sender_id'];
  }
  
  if (isset($_POST['sender_type'])) {
  	$sender_type=$_POST['sender_type'];
  }
  
  if (isset($_POST['receiver_id'])) {
  	$receiver_id=$_POST['receiver_id'];
  }
  
  if (isset($_POST['receiver_type'])) {
  	$receiver_type=$_POST['receiver_type'];
  }
  
  if (isset($_POST['date'])) {
  	$date=$_POST['date'];
  }
  
  if (isset($_POST['chat'])) {
  	$chat=$_POST['chat'];
  }
  
  $sql="insert into messages values('','$chat','$sender_id','$receiver_id','$sender_type','$receiver_type','$date')";
  $dbc=mysqli_query($con,$sql);
  if ($dbc) {
  	echo "done and dusted";
  }

?>