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

              if (isset($_GET['dslug'])) {
                $slug=$_GET['dslug'];
                    $con=mysqli_connect('localhost','root','','infantry');
                    $sql="select * from posts where slug='$slug' ";
                    $dbc=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_array($dbc)) {
                    $title=$row['title'];
                    $content=$row['content'];
                    $slug=$row['slug'];
                    $imgname=$row['imageName'];
                }
                    //echo "<script>alert('trying to edit post.')</script>";
                    //echo "<script>window.location='doctorhome.php'</script>";

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
    <title>Doctor Home</title>

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

            <div class="doctor_table">


                       <div class="row m-t-30">
                            <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <strong><h3 class="title-3 m-b-30">Edit Post here
                                            <?php

                                            if (isset($_POST['editPost'])) {
                                                $slug=$_GET['dslug'];

                                                $Utitle=addslashes($_POST['title']);
                                                $Uslug=addslashes($_POST['slug']);
                                                $Ucontent=addslashes($_POST['content']);
                                                
                                                //if image is not updated
                                             if($_FILES['photo']['name']==''){
                                                $con=mysqli_connect('localhost','root','','infantry');
                                                $sql2="UPDATE posts SET title='$Utitle',content='$Ucontent',slug='$Uslug' WHERE slug='$slug' ";

                                                $dbc=mysqli_query($con,$sql2);
                                                if ($dbc) {
                                                    echo "<script>alert('post has been updated.')</script>";

                                                    echo "<script>window.location='allposts.php'</script>";
                    
                    
                                                }
                                                else
                                                    echo mysqli_error($con);
                                                    
                                                    
                                                }   
                                                else{
                                                    $target_dir='posts/';
                                                    $target_file=$target_dir.basename($_FILES['photo']['name']);
                                                    $img=$_FILES['photo']['name'];

                                                    $con=mysqli_connect('localhost','root','','infantry');
                                                    
                                                     $sql="UPDATE posts SET title='$Utitle',content='$Ucontent',slug='$Uslug',imageName='$img' WHERE slug='$slug' ";

                                                     $dbc=mysqli_query($con,$sql);
                                                
                                                    $upload=move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
                                                   if($dbc && $upload){
                                                     echo "<script>window.location='allposts.php'</script>";
                    
                                                   }
                                                    else
                                                       echo mysqli_error($con);

                                             

                                                    
                                                }
                                              
                                             }

                                            ?>
                                        </h3>
                                        </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Title</label>
                                                <input type="text" id="title" name="title" value="<?=$title?>" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Slug</label>
                                                <input type="text" id="slug" name="slug" value="<?=$slug?>" class="form-control" required>
                                                </div>


                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Post Body</label>
                                                <textarea name="content" class="form-control" rows="8"><?=$content?></textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Post Image</label>
                                                <input type="file" id="image" name="photo" class="form-control" >
                                                
                                            </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" name="editPost">
                                        </form>

            

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