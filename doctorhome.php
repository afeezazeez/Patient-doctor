<?php
session_start();
//if(!isset($_SESSION['doctor_id'])){
  //header("Location:index.php");
//}

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

 
if(isset($_GET['match'])){
    $match_id=$_GET['match'];
    $con=mysqli_connect('localhost','root','','infantry');
    $sql="update matchings set status='1' where id='$match_id' ";
    $dbc=mysqli_query($con,$sql);
    if($dbc){
    echo "<script>alert('chat has been ended.')</script>";
    echo "<script>window.location='doctorhome.php'</script>";
}
else
echo mysql_error($con);
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
        <?php include('includes/sidebar2.php');?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
          <?php include('includes/header.php');?>
            
            <!-- END HEADER DESKTOP-->

            <!--  MATCHINGS-->

                               <div class="row match">
                                    <div class="col-lg-6">
                                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                                            <div class="au-card-title" style="background-image:url('images/pat.png');">
                                                <div class="bg-overlay bg-overlay--blue"></div>
                                                <h3>
                                                    <i class="fa fa-hospital-o"></i>My Patients</h3>
                                                
                                            </div>
                                            <div class="au-task js-list-load au-task--border">
                                                <div class="au-task__title">
                                                    <p><h4 >Patient you are matched with</h4></p>
                                                </div>
                                                <div class="au-task-list js-scrollbar3">
                                                    <?php
                                                    $id=$_SESSION['doctor_id'];
                                                    // echo $id;
                                                        $sql2="select matchings.*, patients.fullName, patients.id as patient_id from matchings, patients where matchings.doctor_id=$id AND patients.id = matchings.patient_id AND matchings.status='0'  ";
                                                              $dbc2=mysqli_query($con,$sql2);
                                                              if ($dbc2->num_rows>0) {
                                                                  # code...
                                                              
                                                              while ($res=mysqli_fetch_array($dbc2)) { ?>
                                                                  
                                                                <div class="au-task__item au-task__item--danger">
                                                                    <div class="au-task__item-inner">
                                                                        <h5 class="task">
                                                                             <?= $res['fullName'] ?>
                                                                            <a href="doctorchat.php?id=<?=$res['patient_id']?>"><button title="chat with <?= $res['fullName'] ?>" style="margin-left: 10px;"  class="btn btn-primary btn-sm start_chat">chat<button></button></a>&nbsp&nbsp
                                                                         <a href="doctorhome.php?match=<?=$res['id']?>">
                                                                         <button class="btn-sm btn-danger btn" title="end chat">end chat</button>
                                                                         </a>
                                                                                

                                                                        </h5>
                                                                        <span class="time" style="text-transform: lowercase;"><?= date('F j, Y, g:i A',strtotime($res['start_date'])) ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php } 
                                                                }
                                                                else{

                                                                    ?>
                                                            <div class="errorss">
                                                            <h5 class="text-center">You </h5>
                                                            <br>
                                                            <h5 class="text-center">Have not </h5>
                                                            <br>
                                                            <h5 class="text-center">Been </h5>
                                                            <br>
                                                            <h5 class="text-center">Matched With </h5>
                                                            <br>
                                                            <h5 class="text-center">Any Patient!</h5>
                                                            </div>
                                                                    <?php
                                                                }
                                                            ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                                            <div class="au-card-title" style="background-image:url('images/pat.png');">
                                                <div class="bg-overlay bg-overlay--blue"></div>
                                                <h3><i class="fa fa-hospital-o"></i>My Posts</h3>
                                                
                                                
                                              
                                            </div>
                                            <div class="au-inbox-wrap">
                                                <div class="au-chat au-chat--border">
                                                    <div class="au-chat__title">

                                                        <?php
                                                              $id=$_SESSION['doctor_id'];
                                                            $con=mysqli_connect('localhost','root','','infantry');
                                                            $sql="select * from posts where doctor_id='$id' ";
                                                            $dbc=mysqli_query($con,$sql);
                                                            if($dbc->num_rows>0){

                                                            
                                                            while ($row=mysqli_fetch_array($dbc)) {
                                                                $Ptitle=$row['title'];
                                                                $Pcontent=$row['content'];
                                                                $Pdate=$row['date_created'];
                                                                $Pphoto=$row['imageName'];
                                                                $Pslug=$row['slug'];
                                                                
                                                            echo '<div class="au-chat-info">';
                                                            echo '<div class="row"> ';
                                                            
                                                            echo '<div class="col-md-4"> ';
                                                            ?>
                                                        <img src="posts/<?php echo $Pphoto;?>" class="post-image">
                                                        </div>
                                                        
                                                            <?php 
                                                            
                                                            echo '<div class="col-md-8"> ';
                                                            echo "<a href=\"postview.php?slug={$Pslug}\" class=\"link\">";

                                                            echo $Ptitle."</a></br>";

                                                            echo $Pdate."<br>";

                                                            echo "</div>"; 
                                                            
                                                            echo "</div>"; 
                                                            echo "</div>"; 
                                                        
                                                        
                                                            
                                                        }
                                                           echo '<div class="viewall"><a href="allposts.php" class="btn btn-sm btn-primary " >View All</a></div>';
                                                             
                                                              
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="errorss">
                                                            <h5 class="text-center">You </h5>
                                                            <br>
                                                            <h5 class="text-center">Have not </h5>
                                                            <br>
                                                            <h5 class="text-center">Post </h5>
                                                            <br>
                                                            <h5 class="text-center">To be </h5>
                                                            <br>
                                                            <h5 class="text-center">Displayed!</h5>
                                                            </div>                                                            
                                                                    <?php
                                                                }

                                                            ?>


                                                         
                                                        
                                                                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- doctor posts-->
                             <div class="post-div">

                       <div class="row m-t-30">
                            <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <strong><h3 class="title-3 m-b-30">Add Post here<?php
                                           

                                        ?></h3>
                                        </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Title</label>
                                                <input type="text" id="title" name="title" placeholder="Enter post title.." class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Slug</label>
                                                <input type="text" id="slug" name="slug" placeholder="Enter post slug.." class="form-control" required>
                                                </div>


                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Post Body</label>
                                                <textarea name="content" class="form-control" rows="8"></textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Post Image</label>
                                                <input type="file" id="image" name="photo" class="form-control" required>
                                                
                                            </div>
                                        <input type="hidden" name="doctor_id" value=
                                        "<?php
                                        $id=$_SESSION['doctor_id'];
                                        echo $id;
                                        ?>"
                                         class="form-control">

                                            <input type="hidden" name="date" value=
                                            "<?php
                                                $newDate = date('F d,Y');
                                                echo $newDate;
                                            ?>" 
                                            class="form-control">
                                        
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" name="addPost">
                                        </form>
                                        <?php
                                            if (isset($_POST['addPost'])) {
                                             $title=$_POST['title'];
                                             $content=addslashes($_POST['content']);
                                             $doctor_id=$_POST['doctor_id'];
                                             $date=$_POST['date'];
                                             $slug=$_POST['slug'];

                                             $target_dir='posts/';
                                             $target_file=$target_dir.basename($_FILES['photo']['name']);
                                             $img=$_FILES['photo']['name'];

                                              $id=$_SESSION['doctor_id'];
                                              $con=mysqli_connect('localhost','root','','infantry');
                                              $sql="insert into posts values('','$title','$content','$id','$date','$img','$slug')";
                                              $dbc=mysqli_query($con,$sql);
                                             $upload=move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
                                            if($dbc && $upload){
                                                echo "<script>alert('post has been saved')</script>";
                                                echo "<script>window.location='doctorhome.php'</script>";
                                             }
                                             else
                                                echo mysqli_error($con);

                                             
                                             
                                         }  

                ?>
                 
                                            
                                        
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                     
                                                  
            



            

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