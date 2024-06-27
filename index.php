<!DOCTYPE html>
<html lang="en">

<head>
	<title>Trang Chủ</title>


<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

		//select all movie
    	$str1 = "select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.date, group_concat(tl.tag, '') as tags
				from ((movies m
				inner join movies_tags t
				on m.id_movies = t.movies_id) 
				inner join tags tl
				on t.tags_id = tl.id)

				group by m.id_movies
                 order by m.date desc";

		//random select for carousel
		$str2 = "select m.id_movies, m.title, m.length, m.rating, m.description, m.imagelink, m.director, group_concat(tl.tag, '') as tags
				from ((movies m
				inner join movies_tags t
				on m.id_movies = t.movies_id) 
				inner join tags tl
				on t.tags_id = tl.id)
				group by m.id_movies
				ORDER BY RAND()
				LIMIT 1";

        $str3 ="select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.date, group_concat(tl.tag, '') as tags
                from ((movies m
                inner join movies_tags t
                on m.id_movies = t.movies_id) 
                inner join tags tl
                on t.tags_id = tl.id)
                where tag like '%cartoon%'
                group by m.id_movies
                order by m.date desc";

        $str4 ="select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.date, group_concat(tl.tag, '') as tags
                from ((movies m
                inner join movies_tags t
                on m.id_movies = t.movies_id) 
                inner join tags tl
                on t.tags_id = tl.id)
                where tag like '%horror%'
                group by m.id_movies
                order by m.date desc";  

        $str5 ="select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.date, group_concat(tl.tag, '') as tags
                from ((movies m
                inner join movies_tags t
                on m.id_movies = t.movies_id) 
                inner join tags tl
                on t.tags_id = tl.id)
                where tag like '%action%'
                group by m.id_movies
                order by m.date desc";

        $str6 ="select m.id_movies, m.title, m.length, m.rating, m.description, m.imagelink, m.director, group_concat(tl.tag, '') as tags
                from ((movies m
                inner join movies_tags t
                on m.id_movies = t.movies_id) 
                inner join tags tl
                on t.tags_id = tl.id)
                group by m.id_movies
                ORDER BY RAND()
                LIMIT 5";   		

		$query1 = $str1;
		$query2 = $str2;
        $query3 = $str3;
        $query4 = $str4;
        $query5 = $str5;
        $query6 = $str6;
       	
        $query_run1 = mysqli_query($connection, $query1);
        $query_run2 = mysqli_query($connection, $query2);
        $query_run3 = mysqli_query($connection, $query3);
        $query_run4 = mysqli_query($connection, $query4);
        $query_run5 = mysqli_query($connection, $query5);
        $query_run6 = mysqli_query($connection, $query6);

        

?>



    <div class="hero-section">
        <!-- HERO SLIDE -->
        <div class="hero-slide">
            <div class="owl-carousel carousel-nav-center" id="hero-carousel">
            	<?php
                        if(mysqli_num_rows($query_run2) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run2))
                            {
                                $did = $row['id_movies'];
                                $dtitle = $row['title'];
                                $dtags = $row['tags'];

                ?>

                <!-- SLIDE ITEM -->
                <div class="hero-slide-item">
                    <img src="<?php  echo $row['imagelink']; ?>" alt="">
                    <div class="overlay"></div>
                    <div class="hero-slide-item-content">
                        <div class="item-content-wraper">
                            <div class="item-content-title top-down">
                                	<?php  echo $row['title']; ?>
                            </div>
                            <div class="movie-infos top-down delay-2">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>Rating:<?php  echo $row['rating']; ?></span>
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>Length:<?php  echo $row['length']; ?></span>
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </div>
                                <div class="movie-info">
              						<i class='bx bxs-pencil'></i>
                                    <span>Director:<?php  echo $row['director']; ?></span>
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-tag"></i>
	                                <span>Tags:<?php  echo $row['tags']; ?></span>
	                                <i class='bx bx-dots-vertical-rounded'></i>
                                </div>
                            </div>
                            <div class="item-content-description top-down delay-4">
                                <?php  echo $row['description']; ?>
                            </div>
                            <div class="item-action top-down delay-6">
                                <!-- <a href="#" class="btn btn-hover">
                                    <i class="bx bxs-right-arrow"></i>
                                    <span>Watch now</span>
                                </a> -->

                                <form id="form1" action="detail.php" method="post">
                                    <a href="detail.php?did=<?php echo $row['id_movies'] ?>" class="btn btn-hover">
                                        <i class="bx bxs-right-arrow"></i>
                                        <span>Xem Ngay</span>
                                    </a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SLIDE ITEM -->

                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>
               
            </div>
        </div>
        <!-- END HERO SLIDE -->

        <!-- TOP MOVIES SLIDE -->
        
        <!-- END TOP MOVIES SLIDE -->
    </div>

 <!-- TOP MOVIES SLIDE -->
        <div class="top-movies-slide">
            <div class="owl-carousel" id="top-movies-slide">
                <?php
                        if(mysqli_num_rows($query_run6) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run6))
                            {
                                $did = $row['id_movies'];
                                $dtitle = $row['title'];
                                $dtags = $row['tags'];

                ?>
                <!-- MOVIE ITEM -->
                <div class="movie-item">
                    <img src="<?php echo $row['imagelink']; ?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title"><a href="detail.php?did=<?php echo $row['id_movies'] ?>">
                            <?php echo $row['title']; ?>
                        </a>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php echo $row['rating']; ?></span>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php echo $row['length']; ?></span>
                            </div>
                            <div class="movie-info">
                                <span><?php echo $row['tags']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MOVIE ITEM -->
                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>
            </div>
        </div>
        <!-- END TOP MOVIES SLIDE -->




        <!-- LATEST MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                latest movies
            </div>

            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->


                <?php
                        if(mysqli_num_rows($query_run1) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run1))
                            {
                               
                 ?>




                    <form id="form2" action="detail.php" method="post">
                    <a href="detail.php?did=<?php echo $row['id_movies'] ?>" class="movie-item">
                    <img src=" <?php  echo $row['imagelink']; ?> " alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php  echo $row['title']; ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php  echo $row['rating']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-tag"></i>
                                <span><?php  echo $row['tags']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php  echo $row['length']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                        </div>
                    </div>
                     </a>

                 </form>



                

                

                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>


                <!-- END MOVIE ITEM -->

                
            </div>
        </div>
    </div>
    <!-- END LATEST MOVIES SECTION -->

    <!-- Horror MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                horror
            </div>

            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->


                <?php
                        if(mysqli_num_rows($query_run4) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run4))
                            {
                               
                 ?>




                    <form id="form2" action="detail.php" method="post">
                    <a href="detail.php?did=<?php echo $row['id_movies'] ?>" class="movie-item">
                    <img src=" <?php  echo $row['imagelink']; ?> " alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php  echo $row['title']; ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php  echo $row['rating']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-tag"></i>
                                <span><?php  echo $row['tags']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php  echo $row['length']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                        </div>
                    </div>
                     </a>

                 </form>



                

                

                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>


                <!-- END MOVIE ITEM -->

                
            </div>
        </div>
    </div>
    <!-- END Cartoon MOVIES SECTION -->


    <!-- horror MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                Cartoon
            </div>

            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->


                <?php
                        if(mysqli_num_rows($query_run3) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run3))
                            {
                               
                 ?>




                    <form id="form2" action="detail.php" method="post">
                    <a href="detail.php?did=<?php echo $row['id_movies'] ?>" class="movie-item">
                    <img src=" <?php  echo $row['imagelink']; ?> " alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php  echo $row['title']; ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php  echo $row['rating']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-tag"></i>
                                <span><?php  echo $row['tags']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php  echo $row['length']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                        </div>
                    </div>
                     </a>

                 </form>



                

                

                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>


                <!-- END MOVIE ITEM -->

                
            </div>
        </div>
    </div>
    <!-- END LATEST MOVIES SECTION -->


    <!-- Action MOVIES SECTION -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                action movies
            </div>

            <div class="movies-slide carousel-nav-center owl-carousel">
                <!-- MOVIE ITEM -->


                <?php
                        if(mysqli_num_rows($query_run5) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run5))
                            {
                               
                 ?>




                    <form id="form2" action="detail.php" method="post">
                    <a href="detail.php?did=<?php echo $row['id_movies'] ?>" class="movie-item">
                    <img src=" <?php  echo $row['imagelink']; ?> " alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                            <?php  echo $row['title']; ?>
                        </div>
                        <div class="movie-infos">
                            <div class="movie-info">
                                <i class="bx bxs-star"></i>
                                <span><?php  echo $row['rating']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-tag"></i>
                                <span><?php  echo $row['tags']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span><?php  echo $row['length']; ?></span>
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </div>
                        </div>
                    </div>
                     </a>

                 </form>



                

                

                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>


                <!-- END MOVIE ITEM -->

                
            </div>
        </div>
    </div>
    <!-- END Action MOVIES SECTION -->








<?php
include('includes/footer.php');
?>