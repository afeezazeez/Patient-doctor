
 <?php
session_start();
function login($email,$password,$userType){
  $con=mysqli_connect('localhost','root','','infantry');
  
  $sql="select * from $userType where emailAddress='$email' and password='$password' ";
  $dbc=mysqli_query($con,$sql);
  if ($dbc->num_rows>0) {
    while ($row=mysqli_fetch_array($dbc)) {
      if ($userType=='doctors') {
        $_SESSION['doctor_id']=$row['id'];
      }
      elseif($userType=='admin'){
          $_SESSION['admin_id']=$row['id'];
      }
      else{
          $_SESSION['patient_id']=$row['id'];
      }
      

    }

     if ($userType=='doctors') {
        header('Location:doctorhome.php');
        
      }

     elseif ($userType=='admin') {
      header('Location:adminhome.php');
     }

     else{
        header('Location:patienthome.php');
      }
    
  }
  
  else{

    ?>
    <div class="text-danger">
    <?php
    echo "incorrect password or username".mysqli_error($con);

  }?>

</div>
<?php

}



?>