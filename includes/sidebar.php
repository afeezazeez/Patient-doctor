      <?php
      if(isset($_SESSION['admin_id'])){
        ?>
      <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="profilePhotos/<?=$imageName ?>" alt="John Doe" />
                    </div>
                    <h4 class="name"><?php echo $username;?></h4>
                    <h5 class="text-muted"><?php echo $email;?></h5>
                    <a href="logout.php" class="text-danger">Sign out</a>



                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-edit"></i>Edit my profile
                                
                            </a>
                            
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-plus"></i>Add new specialization
                    
                            </a>
                            
                        </li>
                        
  
                    </ul>
                </nav>
            </div>
        </aside>
    <?php
        }
    ?>