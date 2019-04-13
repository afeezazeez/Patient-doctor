


<?php
session_start();
  $id=$_SESSION['patient_id'];
  $userType='patients';
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
     $sql="select * from doctors where id='$receiver_id' ";
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
    <m eta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>patient chat</title>

    <!-- Title Page-->
    <?php include('includes/css.php');?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">


    
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php include('includes/sidebar3.php');?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
        <?php include('includes/header.php');?>
            
            <!-- END HEADER DESKTOP-->

            <!-- start chat-->

            <div class="doctor_table">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chatbody">
                          <div class="panel panel-primary">
                            <div class="panel-heading top-bar">
                                <div class="col-md-8 col-xs-8">
                                    <h5 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - <?=$receiver_name?></h5>
                                </div>
                            </div>
                            <div class="panel-body msg_container_base" id="chats">
                               
                                <?php
                                  $query="select * from messages where sender_id='$sender_id' and receiver_id='$receiver_id' and sender_type='$sender_type' or sender_id='$receiver_id' and receiver_id='$sender_id' and sender_type='$receiver_type' ";

                                      $dbc2=mysqli_query($con,$query);
                                      while ($row=mysqli_fetch_array($dbc2)) {
                                        if ($row['sender_id']==$sender_id) {
                                          ?>
                                              <div class="row msg_container base_receive" id="<?=$row['id']?>">
                                                  <div class="col-md-10 col-xs-10">
                                                       <div class="messages msg_receive">
                                                           <p<?=$row['content']?></p>
                                                           <div class="time text-muted"><?=$row['date']?></div>
                                                        </div>
                                                  </div>
                                              </div>

                                          
                                          <?php
                                        }
                                        else{
                                          ?>
                                            <div class="row msg_container base_sent"  id="<?=$row['id']?>">
                                                   <div class="col-md-10 col-xs-10">
                                                         <div class="messages msg_sent">
                                                         <p><?=$row['content']?></p>
                                                          <div class="time text-muted"><?=$row['date']?></div>
                                                         </div>
                                                   </div>
                                                </div>
                                          

                                          
                                          <?php
                                        }
                                      }


                                      




                                ?>

                                

                            </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="chat" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg send" id="send"><i class="fa fa-send"></i></button>
                                    </span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

              <input type="hidden" id="sender_id" value="<?=$sender_id?>" class="form-control"><br>
              <input type="hidden" id="sender_type" value="<?=$sender_type?>" class="form-control"><br>
              <input type="hidden" id="receiver_id" value="<?=$receiver_id?>" class="form-control"><br>
              <input type="hidden" id="receiver_type" value="<?=$receiver_type?>" class="form-control"><br>
              <input type="hidden" id="date" value="<?=$date?>" class="form-control"><br>
              <input type="hidden" id="receiver_name" value="<?=$receiver_name?>" class="form-control"><br>




            






            <!-- end chat-->
            

            <!--footer-->
            <?php include('includes/footer.php');?>

            <!-- END PAGE CONTAINER-->
    
              

    <!-- Jquery JS-->
    
       <?php include('includes/js.php');?>
       <script type="text/javascript" href="js/jquery.min.js"></script>

</body>

</html>
<!-- end document-->




