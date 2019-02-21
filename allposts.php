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

            <!--  MATCHINGS-->
                    <div class="doctor_table">
                         <div class="allpost">
                               <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title" style="color: black">All posts 
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                          <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Content</th>
                                                        <th>content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        
                                                <?php
                                                  $id=$_SESSION['doctor_id'];
                                                    $con=mysqli_connect('localhost','root','','infantry');
                                                    $sql="select * from posts where doctor_id='$id' ";
                                                    $dbc=mysqli_query($con,$sql);
                                                    if($dbc->num_rows>0){

                                                    $count=1;
                                                    while ($row=mysqli_fetch_array($dbc)) {
                                                        $Ptitle=$row['title'];
                                                        $Pcontent=$row['content'];
                                                        $shortContent = substr($Pcontent,0,150)."...";

                                                        
                                                        $Pdate=$row['date_created'];
                                                        $Pphoto=$row['imageName'];
                                                        $Pslug=$row['slug'];
                                                        
                                                        $Pid=$row['id'];
                                                        ?>

                                                    <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$Ptitle?></td>
                                                        <td><?=$shortContent?><a href="postview.php?slug=<?=$Pslug?>" class="btn btn-sm btn-primary readmore">Read More</a></td>
                                                        <td><?=$Pdate?></td>
                                                        <td>
                                                            <a href="editpost.php?dslug=<?=$Pslug?>"><i class="fa fa-edit" style="color: #cccccc" title="edit post"></i></a>&nbsp&nbsp
                                                            <a href="postview.php?dslug=<?=$Pslug?>"><i class="fa fa-trash" title="delete post" style="color: #cccccc"></i></a>
                                                        </td>
                                                        
                                                        
                                                       </tr> 
                                                </tbody>
                                            

                                                        <?php
                                                        $count++;
                                                     }

                                                 }
                                                 else{
                                                    echo "No Post Available";
                                                 }

                                                ?>
                                            </tbody>
                                                </table>
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