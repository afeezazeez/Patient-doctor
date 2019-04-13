<?php
session_start();
function Register($fullName,$email,$password,$userType,$status,$spec,$image,$user_type){
$hash_password=sha1($password);
$con=mysqli_connect('localhost','root','','infantry');

     $target_dir='profilePhotos/';
     $target_file=$target_dir.basename($_FILES['image']['name']);
     $imgName=$_FILES['image']['name'];

//patient registration

if($userType!='doctors'){
   $query="select * from $userType where emailAddress='$email'";
$connect=mysqli_query($con,$query);
if ($connect->num_rows>0) {
  echo "Email exists try another email address";
}

else{
  $sql="insert into $userType  VALUES ('', '$fullName', '$email', '$hash_password','dev.jpg','$user_type')";
  $dbc=mysqli_query($con,$sql);

    if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        echo "image upload failed";
     }

  
if($dbc){
    
     $id=mysqli_insert_id($con);
     $_SESSION['patient_id']=$id;
    header('Location:patienthome.php'); 
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
            $sql="insert into $userType  VALUES ('', '$fullName', '$email', '$hash_password','$status','$spec','$imgName','$user_type')";
            $dbc=mysqli_query($con,$sql);


            if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            echo "image upload failed";
            }
                    
          if($dbc){
              $id=mysqli_insert_id($con);
              $_SESSION['doctor_id']=$id;
              header('Location:doctorhome.php');  
              } 
            else
             echo "Error. Try again later...".mysqli_error($con);

          }

          }




}
?>