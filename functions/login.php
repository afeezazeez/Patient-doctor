 <?php
session_start();
function login($email,$password,$userType){
  $con=mysqli_connect('localhost','root','','infantry');
  
  $sql="select * from $userType where emailAddress='$email' and password='$password' ";
  $dbc=mysqli_query($con,$sql);
  if ($dbc->num_rows>0) {
    while ($row=mysqli_fetch_array($dbc)) {
      $_SESSION['id']=$row['id'];

    }

     if ($userType=='doctors') {
        header('Location:../doctorhome.php');
        
      }

     elseif ($userType=='admin') {
      header('Location:../adminhome.php');
     }

     else{
        header('Location:../patienthome.php');
      }
    
  }
  
  else{
    echo "incorrect password or username".mysqli_error($con);

  }

}



