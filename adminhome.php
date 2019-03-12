<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header("Location:index.php");
}

  $id=$_SESSION['admin_id'];
  $userType='admin';
  $con=mysqli_connect('localhost','root','','infantry');
  $sql="select * from $userType where id='$id' ";
  $dbc=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($dbc)) {
      $username=$row['fullName'];
      $imageName=$row['imageName'];
      $email=$row['emailAddress'];

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
    <title>Welcome <?php echo $username;?></title>

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
            <!-- doctor table-->
                <div class="row">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="doctor_table">
                                             <h3 class="title-3 m-b-30">Doctors verification
                                             </h3>
                                             <?php
                                                if(isset($_POST['verify'])){
                                                    $id=$_POST['doctorId'];
                                                     $con=mysqli_connect('localhost','root','','infantry');
                                                          $sql="update doctors set status=1 where id='$id' ";
                                                          $dbc=mysqli_query($con,$sql);
                                                          if($dbc){
                                                            echo "<script>alert('doctor has been verified')</script>";
                                                          }
                                                         
                                                    
                                                }


                                        if (isset($_POST['addSpec'])) {
                                            $spec=$_POST['spec'];
                                            $sproblem=$_POST['sproblem'];
                                            
                                            $con=mysqli_connect('localhost','root','','infantry');
                                            $sql="INSERT INTO specializations VALUES (NULL, '$spec', '
                                            $sproblem')";
                                            $dbc=mysqli_query($con,$sql);
                                            if ($dbc) {
                                             echo "<script>alert('specialization has been saved')</script>";
                                            }
                                             else
                                               echo "error".mysqli_error($con);
                                                         
                                     

                                                    
                                                }

                                                if(isset($_POST['deleteSpec'])){
                                                    $id=$_POST['specId'];

                                            $con=mysqli_connect('localhost','root','','infantry');
                                            $sql="delete from specializations where id='$id' ";
                                            $dbc=mysqli_query($con,$sql);
                                            if ($dbc) {
                                             echo "<script>alert('specialization has been deleted')</script>";
                                            }
                                             else
                                               echo "error".mysqli_error($con);
                                                         
                                     

                                                }
                                             ?>
                                   
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Specialization</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                          $con=mysqli_connect('localhost','root','','infantry');
                                                          $sql="select * from doctors";
                                                          $dbc=mysqli_query($con,$sql);
                                                          $count=1;
                                                          while ($row=mysqli_fetch_array($dbc)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count;?></td>
                                                        <td><?php echo $row['fullName'];?></td>
                                                        <td><?php echo $row['emailAddress'];?></td>
                                                        <td><?php echo $row['specialization'];?></td>
                                                        
                                                            <?php
                                                                if($row['status']==1){
                                                                ?>
                                                                <td>
                                                                <input type="submit" class="btn btn-sm btn-success"  value="verified" disabled></td>
                                                                <?php
                                                                }
                                                                else{
                                                            ?>
                                                            <td>
                                                            <form action="" method="post">
                                                            <input type="hidden" name="doctorId" value="<?php echo $row['id'];?>">
                                                            <input type="submit" class="btn btn-sm btn-danger" name="verify" value="verify"><br>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                        $count++;
                                                        }

                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE     -->


                       

            <!-- end doctor table-->
             <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h3 class="title-3 m-b-30">Specializations</h3>
                                             
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
            
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th class="align-left">Sample Problems</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                                  $con=mysqli_connect('localhost','root','','infantry');
                                                  $sql="select * from specializations";
                                                  $dbc=mysqli_query($con,$sql);
                                                  $count=1;
                                                  while ($row=mysqli_fetch_array($dbc)) {
                                            ?>
                                                   
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td class="align-right"><?php echo $row['sample_problems'];?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="specId" value="<?php echo $row['id'];?>">
                                                        <input type="submit" class="btn btn-sm btn-danger" name="deleteSpec" value="delete"><br>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            <?php
                                                $count++;
                                                }

                                            ?>
                                        
                                        </tbody>
                                    </table>
                                </div>


                       <div class="row m-t-30" id="spec">
                            <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <strong><h3 class="title-3 m-b-30">Add new specialization here</h3>
                                        </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Specialization</label>
                                                <input type="text" id="spec" name="spec" placeholder="Enter Specialization.." class="form-control" required>
                                                 </div>
                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Sample problems</label>
                                                <input type="sproblem" id="sproblem" name="sproblem" placeholder="Enter Sample Problems.." class="form-control" required>
                                                
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" name="addSpec" value="add specialization">
                                        </form>
                                            
                                        
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