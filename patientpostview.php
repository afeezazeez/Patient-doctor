
  

<?php
session_start();
if(!isset($_SESSION['patient_id'])){
  header("Location:index.php");
}


$id=$_SESSION['patient_id'];
  $userType='patients';
  $con=mysqli_connect('localhost','root','','infantry');
  $sql="select * from $userType where id='$id' ";
  $dbc=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($dbc)) {
      $patient_id=$row['id'];
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
    <title>Patient Post</title>

    <!-- Title Page-->
    <?php include('includes/css.php');?>
        <link rel="stylesheet" type="text/css" href="css/style.css">

    
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

            <!-- posts-->
                <?php
                    if(isset($_GET['slug'])){
                          $slug=$_GET['slug'];
                          $con=mysqli_connect('localhost','root','','infantry');
                          $sql="select * from posts where slug='$slug' ";
                          $dbc=mysqli_query($con,$sql);
                          while ($row=mysqli_fetch_array($dbc)) {
                              $post_id=$row['id'];
                              $post_slug=$row['slug'];
                              $title=$row['title'];
                              $content=$row['content'];
                              $date=$row['date_created'];
                              $imgNm=$row['imageName'];
                          }


                    }

                    if (isset($_POST['addComment'])) {
                        $dateC=$_POST['dateC'];
                        $comment=$_POST['comment'];
                        $postid=$post_id;
                        $name=$username;

                        if($comment==''){
                         echo "<script>alert('comment cannot be empty')</script>";
                    
                        }
                        else{
                          $con=mysqli_connect('localhost','root','','infantry');
                          $sql="insert into comments values('','$postid','$comment','$name','$dateC') ";
                          $dbc=mysqli_query($con,$sql);
                          if ($dbc) {
                            echo "<script>alert('comment has been saved')</script>";
                              
                          }
                          else{
                            echo mysqli_error($con);
                          }
                          
                        }                
                    }


                ?>
             <div class="doctor_table">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                        <div class="au-task js-list-load au-task--border">
                            <div class="au-task__title">
                                <p><h1 class="title-3 m-b-30 text-muted"><?=$title?></h1></p>
                                <p>
                                  <img src="posts/<?php echo $imgNm;?>" class="singlePost">

                                </p>
                                <p class="content-text">
                                    <?=$content?>
                                </p><br>
                                <p>Posted on <?=$date?>&nbsp&nbsp
                              </p>
                            </div>
                            <div class="comment">
                               <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Comments  
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                              $con=mysqli_connect('localhost','root','','infantry');
                                              $sql="select * from comments where post_id='$post_id' ";
                                              $dbc=mysqli_query($con,$sql);
                                              if($dbc->num_rows>0){
                                                while ($res=mysqli_fetch_array($dbc)) {
                                                    $commentId=$res['id'];
                                              
                                                  
                                              ?>
                                                <div class="details">                  
                                                <p class="card-text"><span class="com"><i class="fa fa-comment"></i></span><i><?=$res['body']?></i>&nbsp&nbsp&nbsp</p>

                                                <p class="card-text">by <?=$res['patient_name']?></p>
                                                <p class="card-text"><?=$res['date']?>
                                              
                                                </p><br></div>

                                                 <?php
                                          }
                                      }
                                      else{
                                        ?>
                                         <p class="card-text">No comment for this post!</p>
                                               
                                        <?php

                                      }
                                     ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                               <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Add Comment  
                                                          
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                          <div class="form-group">
                                                <label for="" class=" form-control-label">Comment</label>
                                                <textarea name="comment" class="form-control" rows="5" placeholder="Enter comment"></textarea>
                                                
                                            </div>


                                            <input type="hidden" name="dateC" value=
                                            "<?php
                                                $newDate = date('F d,Y');
                                                echo $newDate;
                                            ?>" 
                                            class="form-control">
                                     
                                        <input type="submit" class="btn btn-primary btn-sm" name="addComment" style="margin: 10px">
                                        </form>
                                    

                                               

                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                                                                                         
                                
                        </div>
                     </div>
                 </div>
             </div>
                
                                                         
            <!-- end posts-->
         
                                                  
            



            

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