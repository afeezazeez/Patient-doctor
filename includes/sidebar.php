      <aside class="menu-sidebar2">
            <div class="logo">
                <a href="">
                    <img src="images/logo.png" class="small" alt="Cool Admin" />
                    <font color="white" size="4px">Infantry Nga</font>              
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <a href="adminhome.php">
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
                                <i class="fas fa-eit"></i>Edit my profile
                                
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#spec">
                                <i class="fas fa-pls"></i>Add new specialization
                    
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-show"></i>View specializations
                    
                            </a>
                            
                        </li>
                        
  
                    </ul>
                </nav>
            </div>
        </aside>

