<?php
session_start();
if(!isset($_SESSION['doctor_id'])){
  header("Location:index.php");
}

  $id=$_SESSION['doctor_id'];
  $userType='doctors';
  $con=mysqli_connect('localhost','root','','infantry');
  $sql="select * from $userType where id='$id' ";
  $dbc=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($dbc)) {
      $username=$row['fullName'];
      $imageName=$row['imageName'];
      $email=$row['emailAddress'];
      $Duser_type=$row['user_type'];

  }

 
  



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Add post</title>

    <!-- Title Page-->
    <?php include('includes/css.php');?>
        <link rel="stylesheet" type="text/css" href="css/style.css">

    
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php include('includes/sidebar.php');?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
          <?php include('includes/header.php');?>
            
            <!-- END HEADER DESKTOP-->




            

            <!--footer-->
            <?php include('includes/footer.php');?>

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
       <?php include('includes/js.php');?>

</body>

</html>
<!-- end document-->