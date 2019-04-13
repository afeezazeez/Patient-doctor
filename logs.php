<?php
  $con=mysqli_connect('localhost','root','','infantry');

  
  if (isset($_POST['sender_id'])) {
  	$sender_id=$_POST['sender_id'];
  }
  if (isset($_POST['receiver_name'])) {
  	$receiver_name=$_POST['receiver_name'];
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

  if (isset($_POST['last_message_id'])) {
  $last_message_id=$_POST['last_message_id'];
  }


  $query="select * from messages where sender_id=$sender_id and receiver_id= $receiver_id and sender_type= $sender_type and id > $last_message_id or sender_id= $receiver_id and receiver_id= $sender_id and sender_type= $receiver_type  and id> $last_message_id ";
    $dbc2=mysqli_query($con,$query);
  // exit(var_dump($dbc2));
  $rows= mysqli_fetch_all($dbc2, MYSQLI_ASSOC);
  // exit(var_dump($row));
    echo json_encode($rows);

?>