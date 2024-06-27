<!DOCTYPE html>
<html lang="en">

<head>
	<title>Review</title>

<?php 
	include('security.php');
 ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        EWorld
    </title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- APP CSS -->

    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 	

	
     <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/app.css">

  <style>

.navbar .nav-item:not(:last-child) {
  margin-right: 35px;
}

.dropdown-toggle::after {
   transition: transform 0.15s linear; 
}

.show.dropdown .dropdown-toggle::after {
  transform: translateY(3px);
}

.dropdown-menu {
  margin-top: 0;
}

  </style>

   <link rel="icon" type="image/x-icon" href="images/logo/logo.png" />

</head>

<body>
	<?php
	include('includes/navbar.php'); 
	?>
	<?php 
	$limit = 8;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $connection->query("
		SELECT * FROM review
		order by date desc	
		LIMIT $start, $limit");
	$str1 = "SELECT * FROM review
		order by date desc	
		LIMIT $start, $limit";


		$query1 = $str1;

		$query_run1 = mysqli_query($connection, $query1);

	$row = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $connection->query("SELECT count(id_review) AS id_review FROM review");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id_review'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;


	// $sql= "select * from books";

	// $query = mysqli_query($connect,$sql);
	?>

			<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="review.php?page=<?=$Previous;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="review.php?page=<?=$i;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="review.php?page=<?=$Next;?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>				


	<div class="container">
<?php
                        if(mysqli_num_rows($query_run1) > 0)        
                        {
                            while($row3 = mysqli_fetch_assoc($query_run1))
                            {
                               

                ?>

                <div class="row"> 
                	<div class="col-md-12">
	             	   <div class="card newfeed" width="100%">
								<div class="row">
									<div class="col-md-1" style="padding:0 0 0 20px">
										<img src="images/blank.jpg" alt="" class="align-self-start mr-3 rounded-circle" style="width:50px;">
									</div>
									<div class="col-md-6">
										<h6 style="color: black"> <?php echo $row3['author']; ?><small><br><i> <?php echo $row3['date']; ?></i></small></h6>
									</div>
									<hr>
								</div>
								<div>
									<div class="row">
										<div class="col-md-10 col-sm-12">
											<h1 style=" color: black"><center><?php echo $row3['title']; ?></center></h1>

										</div>
										<div class="col-md-2 col-sm-12" style="">
											<img src="<?php echo $row3['image_link']; ?>" class="img-thumbnail" width="40%">
										</div>
										
									</div>
									<form action="detail_review.php" method="GET">
										<input hidden type="text" name="id_review" value="<?php echo $row3['id_review']; ?>">
										<div align="center">
										<button type="submit" class="btn btn-sm " style="color:blue">Xem bài viết</button>
										</div>	
									</form>
									
								</div>
								
								
						</div>
					</div>
				</div>





			<?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>

                <div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="review.php?page=<?=$Previous;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="review.php?page=<?=$i;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="review.php?page=<?=$Next;?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>






	<?php
	include('includes/footer.php');
	?>