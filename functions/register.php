<?php
session_start();
function Register($fullName,$email,$password,$userType,$status){
$con=mysqli_connect('localhost','root','','infantry');


//patient registration

if($userType!='doctors'){
  $query="select * from $userType where emailAddress='$email'";
$connect=mysqli_query($con,$query);
if ($connect->num_rows>0) {
  echo "Email exists try another email address";
}

else{
  $sql="insert into $userType  VALUES ('', '$fullName', '$email', '$password')";
  $dbc=mysqli_query($con,$sql);
  
if($dbc){
    
     $id=mysqli_insert_id($con);
     $_SESSION['id']=$id;
    header('Location:../patienthome.php'); 
  }
  else
   echo "Error. Try again later...".mysqli_error($con);

}


}

//doctor reegistration
  
  else{

         $query="select * from $userType where emailAddress='$email'";
          $connect=mysqli_query($con,$query);
          if ($connect->num_rows>0) {
            echo "Email exists try another email address";
          }

          else{
            $sql="insert into $userType  VALUES ('', '$fullName', '$email', '$password','$status')";
            $dbc=mysqli_query($con,$sql);
            
          if($dbc){
              $id=mysqli_insert_id($con);
              $_SESSION['id']=$id;
              header('Location:../doctorhome.php');  
              } 
            else
             echo "Error. Try again later...".mysqli_error($con);

          }

          }
}




?>