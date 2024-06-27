<?php
include('security.php');
if(isset($_GET['did'])){
    $did = $_GET['did'];
     $str1 = "select m.id_movies, m.title, m.length, m.rating, m.description, m.imagelink, m.director, m.movielink, group_concat(tl.tag, '') as tags
                from ((movies m
                inner join movies_tags t
                on m.id_movies = t.movies_id) 
                inner join tags tl
                on t.tags_id = tl.id)
                where m.id_movies = '$did'
                group by m.id_movies";

     $query1 = $str1;

     $query_run1 = mysqli_query($connection, $query1);

     $row = mysqli_fetch_assoc($query_run1);
     $dtitle = $row['title'];
}




?>

<head>
    <title><?php echo $dtitle; ?></title>
<?php 

include('includes/header.php'); 
include('includes/navbar.php'); 






 ?>



<div class="container">
    <div class="cards" style="background-color: black">
        <div class="cards-body">
            <h3 class="card-title">Phim: <?php  echo $row['title']; ?> </h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img style="width: 100%" src="<?php  echo $row['imagelink']; ?>" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Mô Tả</h4>
                    <p><?php  echo $row['description']; ?></p>
                    <h2 class="mt-5 text-success">
                        Rating:<?php  echo $row['rating']; ?>
                    </h2>
                    <h3 class="box-title mt-5">Chi tiết</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Thời lượng: <?php  echo $row['length']; ?></li>
                        <li><i class="fa fa-check text-success"></i>Thể loại: <?php  echo $row['tags']; ?></li>
                        <li><i class="fa fa-check text-success"></i>Đạo diễn: <?php  echo $row['director']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="embed-responsive embed-responsive-16by9">
  <?php echo $row['movielink'] ?>
</div>

<?php
include('comment_section.php');
include('includes/footer.php');
?>