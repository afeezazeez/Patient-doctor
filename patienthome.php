
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

      $con=mysqli_connect('localhost','root','','infantry');
        $sql="select * from appointments where patient_name='$username' ";
        $dbc=mysqli_query($con,$sql);
        $doc=mysqli_fetch_array($dbc);
        $doc_id=$doc['doctor_id'];
    

        $query=mysqli_query($con,"select * from doctors where id='$doc_id' ");
        $doc_name=mysqli_fetch_array($query);
        $name=$doc_name['fullName'];
        
    

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
    <title>Patient Home</title>

    <!-- Title Page-->
    <?php include('includes/css.php');?>
    
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
            <div class="content" style="padding: 110px;">
                 <div class="allpost">
                      <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title" style="color: black">
                                          Doctors you have been matched with 
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                                  <?php
                                                  $id=$_SESSION['patient_id'];
                                                        $sql2="select matchings.*, doctors.fullName,doctors.id from matchings, doctors where matchings.patient_id=$id AND doctors.id = matchings.doctor_id AND matchings.status='0'  ";
                                                        $dbc2=mysqli_query($con,$sql2);
                                                        if ($dbc2->num_rows>0) {

                                                          ?>
                                                          <div class="table-responsive m-b-40">
                                                            <table class="table table-borderless table-data3">
                                                              <thead>
                                                                  <tr>
                                                                      <th>Doctor name</th>
                                                                      <th>Complaint</th>
                                                                      <th>Chat</th>
                                                                    </tr>
                                                              </thead>
                                                               <tbody>
                                                        
                                                          <?php
                                                          while ($res=mysqli_fetch_array($dbc2)) { ?>
                                                              <tr>
                                                                <td>
                                                              <div class="au-task__item au-task__item--danger">
                                                                    <div class="au-task__item-inner">
                                                                        <h5 class="task">
                                                                             <?= $res['fullName'] ?>
                                                                            </h5></td>

                                                                            <td><div style="margin: 20px;"><?=$res['complaint']?></div>
                                                                          </td>

                                                                            <td>
                                                                              <div style="margin: 20px;">
                                                                            <a href="patientchat.php?id=<?=$res['id']?>"><button style="margin-left: 10px;" id="<?= $res['doctor_id'] ?>"><i title="Chat with <?= $res['fullName'] ?>" class="zmdi zmdi-comment-text" ></i></<button></div></a>
                                                                        
                                                                        </td>

                                                                    </div>
                                                                </div>
                                                              </tr>
                                                            
                                                              <?php


                                                          }

                                                        
                                                        }

                                                          else{
                                                            echo "<div class='text-danger'>You have not been matched to any doctor!</div>";
                                                          }
                                                        

                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            
            <!-- BREADCRUMB-->


                                   <div class="allpost">
                      <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title" style="color: black">My appointments
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                                <?php
                                                      $Did=$_SESSION['patient_id'];
                                                      $con=mysqli_connect('localhost','root','','infantry');
                                                      $sql="select * from appointments where patient_name='$id' and status='0' ";
                                                      $dbc=mysqli_query($con,$sql);
                                                      
                                                      if ($dbc->num_rows>0) {
                                                        ?>
                                                          <div class="table-responsive m-b-40">
                                                            <table class="table table-borderless table-data3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>doctor name</th>
                                                                        <th>date</th>
                                                                    </tr>
                                                                </thead>
                                                                 <tbody>
                                                          
                                                        <?php
                                                        
                                                        $count=1;
                                                        while ($app=mysqli_fetch_array($dbc)) {
                                                            $app_id=$app['id'];
                                                            $date=$app['date'];
                                                            $doc_id=$app['doctor_id'];

                                                            $result=mysqli_fetch_array(mysqli_query($con,"select * from doctors where id='$doc_id' "));
                                                            $name=$result['fullName'];  

                                                            ?>
                                                        <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$name?></td>
                                                        <td><?=$date?></td>
                                                        
                                                        
                                                       </tr> 
                                                


                                                            <?php
                                                            $count++;
                                                        }
                                                          
                                                      }
                                                      else{
                                                            echo '<div class="text-danger">You have no pending appointment with any doctor</div>';
                                                            
                                                      }


                                                ?>
                                               
                                             </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            




                         <div class="allpost">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title " style="color: black">Enter Your complaint or select from the dropdown<BR>
                                          <b style="color: red">Note</b>: if you enter no complaint into the text area,<br> the selected complaint in the dropdown is picked automatically<br>
                                            <?php
                                                if (isset($_POST['complain'])) {


                                                  $patients_id=$_SESSION['patient_id'];
                                                    $dropdownComplaint=$_POST['dropcomplaint'];
                                                    $complaint=$_POST['complaint'];

                                                  if ($complaint=='') {

                                                    $dbc=mysqli_query($con,"select * from specializations where sample_problems='$dropdownComplaint' ");
                                                        $result=mysqli_fetch_array($dbc);
                                                        $sample=$result['name'];

                                                      $sql="select doctors.id,doctors.fullName from doctors where doctors.specialization='$sample' and doctors.status=1";
                                                      $dbc=mysqli_query($con,$sql);
                                                      $isMatched = false;
                                                      $hasMatch=false;
                                                      $responseMsg = 'No Doctor Available';

                                                      $queryCheckForPrev = mysqli_query($con,"select * from matchings where patient_id='$patients_id' and complaint='$dropdownComplaint' and status='1' ");
                                                      if(mysqli_num_rows($queryCheckForPrev) === 1) {
                                                        $RemactchSql="update matchings set status='0' where patient_id='$patients_id' and complaint='$dropdownComplaint' and status='1' ";
                                                        $RemactchQuery=mysqli_query($con,$RemactchSql);
                                                        if ($RemactchQuery) {
                                                          $responseMsg = 'You have been matched to a doctor before on similar issue. So you have been rematched to him again';

                                                        }
                                                          

                                                      }else {

                                                        while ($row=mysqli_fetch_array($dbc)) {
                                                            $id=$row['id'];

                                                            $result=mysqli_query($con,"select * from matchings where doctor_id='$id' and complaint='$dropdownComplaint'and status='0' ");


                                                            $matches=$result->num_rows;
                                                            
                                                                  
                                                                                                             
                                                            if ($matches<4) {

                                                                $resultPrevious=mysqli_query($con,"select * from matchings where doctor_id='$id' and complaint='$dropdownComplaint' and status='0' and patient_id='$patients_id' ");

                                                                if(mysqli_num_rows($resultPrevious) > 0 )  {
                                                                   $responseMsg = "You are currently being attended to by a doctor for this complaint";
                                                                    break;
                                                                }else{

                                                                  $date=date('F j, Y, g:i A');                                                       
                                                                 $matching=mysqli_query($con,"insert into matchings values('','$date','-','$id','$patients_id','$dropdownComplaint','0')");
                                                                  $isMatched = true;                                                     
                                                                    break;
                                                                }  
                                                            }
                                                                                                                    
                                                        }
                                                        
                                                      }
                                                      
                                                      
                                                    echo $isMatched==true ? "<script>alert('You have been matched to a doctor!') </script>" : "<script>alert('$responseMsg')</script>";


                                                  }

                                                  // fix text area matching

                                                  else{

                                                     $complaint = explode(" ", $_POST['complaint']);
                                                      $queries ="SELECT * FROM specializations WHERE sample_problems like '%" . $complaint[0] . "%'";
      
                                                     for($i = 1; $i < count($complaint); $i++) {
                                                        if(!empty($complaint[$i])) {
                                                            $queries .= " OR sample_problems like '%" . $complaint[$i] . "%'";
                                                        }
                                                      }
                                                       $dbc=mysqli_query($con,$queries);
                                                       $result=mysqli_fetch_array($dbc);
                                                       $sample=$result['name'];
                                                       $sql="select doctors.id,doctors.fullName from doctors where doctors.specialization='$sample' and doctors.status=1";
                                                      $dbc=mysqli_query($con,$sql);
                                                      $isMatched = false;
                                                      $hasMatch=false;
                                                      $responseMsg = 'No Doctor Available';

                                                      $queryCheckForPrev = mysqli_query($con,"select * from matchings where patient_id='$patients_id' and complaint='$dropdownComplaint' and status='1' ");

                                                      
                                                      if(mysqli_num_rows($queryCheckForPrev) === 1) {
                                                        $RemactchSql="update matchings set status='0' where patient_id='$patients_id' and complaint='$complaint' and status='1' ";
                                                        $RemactchQuery=mysqli_query($con,$RemactchSql);
                                                        if ($RemactchQuery) {
                                                          $responseMsg = 'You have matched to a doctor before on similar issue. So you have been rematched to him again';

                                                        }
                                                          

                                                      }else {

                                                        while ($row=mysqli_fetch_array($dbc)) {
                                                            $id=$row['id'];

                                                            $result=mysqli_query($con,"select * from matchings where doctor_id='$id' and complaint='$dropdownComplaint'and status='0' ");


                                                            $matches=$result->num_rows;
                                                            
                                                                  
                                                                                                             
                                                            if ($matches<4) {

                                                                $resultPrevious=mysqli_query($con,"select * from matchings where doctor_id='$id' and complaint='$dropdownComplaint' and status='0' and patient_id='$patients_id' ");

                                                                if(mysqli_num_rows($resultPrevious) > 0 )  {
                                                                   $responseMsg = "You are currently being attended to by a doctor for thiscomplaint.";
                                                                    break;
                                                                }else{

                                                                  $date=date('F j, Y, g:i A');                                                       
                                                                 $matching=mysqli_query($con,"insert into matchings values('','$date','-','$id','$patients_id','$dropdownComplaint','0')");
                                                                  $isMatched = true;                                                     
                                                                    break;
                                                                }  
                                                            }
                                                                                                                    
                                                        }
                                                        
                                                      }
                                                      
                                                      
                                                  


                                                        }
                                                         echo $isMatched==true ? "<script>alert('You have been matched to a doctor!') </script>" : "<script>alert('$responseMsg')</script>";


                                                      
                                              }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Check for likely complaint in the dropdown</label>
                                                <select name="dropcomplaint" class="form-control">
                                                        <?php
                                                        $sql="select * from specializations";
                                                        $dbc=mysqli_query($con,$sql);
                                                        while ($row=mysqli_fetch_array($dbc)) {
                                                            echo "<option value=\"{$row['sample_problems']}\">{$row['sample_problems']}</option>";
                                                            }      
                                                        ?>
                                                        

                                                        
                                                    </select> 
                                                </div>

                                            <div class="form-group">
                                                <label for="" class=" form-control-label">Enter your complaint here</label>
                                                <textarea name="complaint" class="form-control" rows="8"></textarea>
                                                
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" value="submit complaint" name="complain">
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


