        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="">
                    <img src="images/logo.png" style="width: 60px;" alt="Cool Admin" />
                    <font color="white" size="4px">Infantry Nga</font>              
                  
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <a href="patienthome.php">
                    <div class="image img-cir img-120">
                        <img src="profilePhotos/<?=$imageName ?>" alt="John Doe" />
                    </div>
                </a>
                    <h4 class="name"><?php echo $username;?></h4>
                    <h5 class="text-muted"><?php echo $email;?></h5>
                    <a href="logout.php" class="text-danger">Sign out</a>



                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-eit"></i>Profile
                                
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-edt"></i>View my Appointments
                                
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-edt"></i>My Doctors
                                
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="patientposts.php">
                                <i class="fas fa-edt"></i>Doctors Posts
                                
                            </a>
                            
                        </li>
                        
                        
  
                    </ul>
                </nav>
            </div>
        </aside>
    