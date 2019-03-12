<?php
session_start();
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

 if (isset($_GET['id'])) {
   $receiver_id=$_GET['id'];
     $sql="select * from patients where id='$receiver_id' ";
     $dbc=mysqli_query($con,$sql);
     while ($row=mysqli_fetch_array($dbc)) {
      $receiver_name=$row['fullName'];
      $receiver_type=$row['user_type'];

  }

 }

 $date=date("g:i a.", time());
 $sender_id=$id;
 $sender_type=$Duser_type;

     

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
    <title>Doctor Home</title>

    <!-- Title Page-->
    <?php include('includes/css.php');?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">


    
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php include('includes/sidebar2.php');?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
          <?php include('includes/header.php');?>
            
            <!-- END HEADER DESKTOP-->

            <!-- start chat-->

                      <div class="doctor_table">
                         <div class="allpost">
                               <div class="col-md-12">
                                  <div class="card">
                                      <div class="card-header">
                                          <strong class="card-title" style="color: black">Chat with <font color="blue"><?=$receiver_name?></font>
                                          </strong>
                                      </div>
                                  <div class="card-body chatBody">
                                    <div class="chats" style="height: 343px; overflow-y: auto;">
                                      
                                      <input type="hidden" id="receiver_id" class="form-control" value="<?=$receiver_id?>"><br>
                                      <input type="hidden" id="receiver_type" class="form-control" value="<?=$receiver_type?>"><br>
                                      <input type="hidden" id="sender_id" class="form-control" value="<?=$sender_id?>"><br>
                                      <input type="hidden" id="sender_type" class="form-control" value="<?=$sender_type?>"><br>
                                      <input type="hidden" id="date" class="form-control" value="<?=$date?>"><br>
                                      
                                      <!-- <div class="bubble  green" style="float: left;">hi </div><br>
                                      <div class="bubble  red" style="float: right;">wassup</div> -->
                                    </div>
                                    <textarea name="chat" id="chat" class="form-control"></textarea>
                                    <input type="submit" name="send" value="send" id="send" class="btn btn-success  btn-sm" style="margin:10px; float: right;">
                                  </div>  
                              </div>
                          </div>
                      </div>



            






            <!-- end chat-->
            

            <!--footer-->
            <?php include('includes/footer.php');?>

            <!-- END PAGE CONTAINER-->
    
              

    <!-- Jquery JS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
       <?php include('includes/js.php');?>

</body>

</html>
<!-- end document-->