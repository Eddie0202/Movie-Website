    <!-- NAV -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="index.php" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>E<span class="main-color">World</span>
                </a>
       

                <ul class="nav-menu" id="nav-menu">
                    <i class="bx bxs-search"></i>
                    
                        <li class="nav-item">
                            <form action="searching.php" method="GET">
                            <input type="text" name="search" placeholder="Tìm kiếm phim" style="width: 95%;">
                            <button hidden type="submit" name="searching"></button>
                            </form>
                        </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Thể Loại
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                        <?php 
                        $tags_qr1 = "select *
                                    from tags";
                        $qr1 = $tags_qr1;
                        $qr_run1 = mysqli_query($connection, $qr1);

                        if(mysqli_num_rows($qr_run1) > 0)        
                        {
                            while($nav_row = mysqli_fetch_assoc($qr_run1))
                            {
                                

                        ?>

                        <a class="dropdown-item" style="color: black" href="catalog.php?tagid=<?php echo $nav_row['id'] ?>"><?php echo $nav_row['tag'] ?></a>

                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
<!--                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" style="color: black" href="#">Something else here</a> -->
                      </div>
                    </li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="#">Về Chúng Tôi</a></li>
                    
                    <?php 
                    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
                        $uname = $_SESSION['user_name'];
                        if ($_SESSION['role']=="admin") {
                            # code...
                            $role = $_SESSION['role']; 
                        }
                    ?>
                    <li class="nav-item dropdown">
                        <a href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Hello, <?php echo $uname; ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <?php 
                            if ($_SESSION['role']=='admin') {
                            # code...
                            ?>
                        <a class="dropdown-item" style="color: black" href="admin/index.php">Trang Quản Trị</a>
                            <?php } ?>
                        <a class="dropdown-item" style="color: black" href="logout.php">Đăng Xuất</a>
                      </div>
                    </li>
                    <?php 
                    }else{
                    ?>

                    <li>
                        <a href="login.php" class="btn btn-hover">
                            <span>Đăng Nhập</span>
                        </a>
                    </li>
                     <?php } ?>
                </ul>

                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAV -->

<!--    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img class="logo horizontal-logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/horizontal-logo.svg" alt="forecastr logo">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->