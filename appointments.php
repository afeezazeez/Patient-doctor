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

  


                                        
 if (isset($_POST['addApp'])) {
        $patient_name=$_POST['patient_name'];
        $app_date=$_POST['app_date'];
        $id=$_SESSION['doctor_id'];
        $con=mysqli_connect('localhost','root','','infantry');
        $sql="insert into appointments values('','$app_date','$patient_name','$id','0')";
        $dbc=mysqli_query($con,$sql);
        if ($dbc) {
        echo "<script>alert('appointment has been created.')</script>";
        echo "<script>window.location='appointments.php'</script>";
      
     
        }
        else{
            echo mysqli_error($con);
        }

    
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
            <div class="doctor_table">
                   <div class="allpost">
                               <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title" style="color: black">My appointments
                                            <?php
                                           if (isset($_GET['app_id'])) {
                                              $app_id=$_GET['app_id'];
                                              $con=mysqli_connect('localhost','root','','infantry');
                                              $sql="UPDATE appointments SET status=1 WHERE id=$app_id";
                                              $dbc=mysqli_query($con,$sql);
                                              if ($dbc) {
                                                    echo "<script>alert('Appointment has been ended.')</script>";
                                                    echo "<script>window.location='appointments.php'</script>";

                                              }
                                              else{
                                                echo mysqli_error($con);

                                              }
                                          }

                                            ?>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                                <?php
                                                      $Did=$_SESSION['doctor_id'];
                                                      $con=mysqli_connect('localhost','root','','infantry');
                                                      $sql="select * from appointments where doctor_id='$Did' and status='0' ";
                                                      $dbc=mysqli_query($con,$sql);
                                                      if ($dbc->num_rows>0) {
                                                        ?>
                                                        <div class="table-responsive m-b-40">
                                                          <table class="table table-borderless table-data3">
                                                              <thead>
                                                                  <tr>
                                                                      <th>S/N</th>
                                                                      <th>patient name</th>
                                                                      <th>date</th>
                                                                      <th>Action</th>
                                                                  </tr>
                                                              </thead>
                                                               <tbody>
                                                        
                                                        <?php
                                                        $count=1;
                                                        while ($app=mysqli_fetch_array($dbc)) {
                                                            $app_id=$app['id'];
                                                            $date=$app['date'];
                                                            $Pname=$app['patient_name'];
                                                            $status=$app['status'];
                                                            ?>
                                                        <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$Pname?></td>
                                                        <td><?=$date?></td>
                                                        <td>
                                                            <a href="appointments.php?app_id=<?=$app_id?>"><i class="fa fa-check-square" title="end appointment" style="color: #cccccc"></i></a>
                                                        </td>
                                                        
                                                        
                                                       </tr> 
                                                


                                                            <?php
                                                            $count++;
                                                        }
                                                          
                                                      }
                                                      else{
                                                             echo "<div class='text-danger'>You have no pending appointment with any patient.'</div>";
                                                        

                                                      }


                                                ?>
                                               
                                        
                                                   </tbody>
                                            
                                                </tbody>
                                                </table>
                                        </div>
                                                                                  
                                        </div>
                        </div>

                         <div class="row m-t-30">
                            <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                   <strong class="card-title" style="color: black">Create new appointment
                                    
                                    </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Patient Name</label>
                                                <input type="text" id="patient_name" name="patient_name" placeholder="Enter patient name." class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Date</label>
                                                <input type="text" id="app_date" name="app_date" placeholder="Date should be in Format.... 'February 21,2019 13:00 PM' .." class="form-control" required>
                                                </div>
                                                <div class="card-footer">
                                                <input type="submit" class="btn btn-primary btn-sm" name="addApp">
                                                </form>
                                                
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