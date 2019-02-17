<?php


include("functions/register.php");
$con=mysqli_connect('localhost','root','','infantry');



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
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/style.css" rel="stylesheet" media="all">
    
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                        <div class="login-logo">
                            <a href="#">
                             <a href="#">
                               <b>INFANTRY NGA</b><br>
                              Doctor Registration Portal
                              <a href="index.php" class="button" ">
                                <span<i class=" fa fa-arrow-left"></i></span><span>back</span>
                            </a>
                            
                            </a>
                            </a>
                        </div>
                        <div class="login-form">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                          <?php
                                                if(isset($_POST['submit'])){
                                                    ?>

                                                    <div class="text-danger error">

                                                        <?php

                                                        $pass=strlen($_POST['password']);
                                                        
                                                        if($pass<6){
                                                            echo "password cannot bee less than 6 characters";
                                                        }
                                                        elseif($pass>15) {
                                                            echo "password cannot be greater than 15 characters";
                                                        }
                                                        else{

                                                    $userType='doctors';
                                                    $fullName=$_POST['fullName'];
                                                    $email=$_POST['email'];
                                                    $password=$_POST['password'];
                                                    $Cpassword=$_POST['Cpassword']; 
                                                    $status=0;
                                                    $user_type=1;
                                                    $spec=$_POST['spec'];
                                                    $image=$_FILES;;
                                                    if($Cpassword!=$password){
                                                        echo "Passwords do not match..";
                                                    }


                                                    else{
                                                    Register($fullName,$email,$password,$userType,$status,$spec,$image,$user_type);   

                                                    }

                                                    }

                                                    }

                                            ?>
                                       
                                    </div>
                                        

                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="fullName" name="fullName" placeholder="Full Name" class="form-control" required>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                                </div>
                                            </div>
                                    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-stethoscope"></i>
                                                    </div>
                                                    <select name="spec" class="form-control">
                                                        <?php
                                                        $sql="select * from specializations";
                                                        $dbc=mysqli_query($con,$sql);
                                                        while ($row=mysqli_fetch_array($dbc)) {
                                                            echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
                                                            }      
                                                        ?>
                                                        

                                                        
                                                    </select> 
                                                    </div>
                                            </div>

                                            

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-photo"></i>
                                                    </div>
                                                    <input type="file" id="image" name="image"  class="form-control" required>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="between 6-15 characters" class="form-control" required>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <input type="password" id="Cpassword" name="Cpassword" placeholder=" confirm Password" class="form-control" required>
                                                </div>
                                            </div>
                                            

                                            <div class="form-actions form-group">
                                                <button type="submit" name='submit'class="btn btn-success btn-sm">Submit</button>
                                            
                                            </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="register-link">
                                <p>
                                    Alraedy have an account?
                                    <a href="#">Sign In Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->