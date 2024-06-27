<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tìm kiếm:</title>


	<?php
	include('security.php');
	include('includes/header.php'); 
	include('includes/navbar.php'); 

	?>

	<?php 

	if (isset($_GET["search"])) {
		$s = $_GET["search"];
		$limit = 12;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$start = ($page - 1) * $limit;
		$result = $connection->query("
			select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.description, m.director, group_concat(tl.tag, '') as tags
			from ((movies m
			inner join movies_tags t
			on m.id_movies = t.movies_id) 
			inner join tags tl
			on t.tags_id = tl.id)
			where m.title like '%$s%'
			group by m.id_movies
			order by m.date desc	
			LIMIT $start, $limit");
		$str1 = "
			select m.id_movies, m.title, m.length, m.rating, m.imagelink, m.description, m.director, group_concat(tl.tag, '') as tags
			from ((movies m
			inner join movies_tags t
			on m.id_movies = t.movies_id) 
			inner join tags tl
			on t.tags_id = tl.id)
			where m.title like '%$s%'
			group by m.id_movies
			order by m.date desc
			LIMIT $start, $limit";
	}


	


		$query1 = $str1;

		$query_run1 = mysqli_query($connection, $query1);

	$row = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $connection->query("SELECT count(id_movies) AS id_movies FROM movies where title like '%$s%'");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id_movies'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
	?>

	<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="searching.php?page=<?=$Previous;?>&amp;search=<?=$s;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="searching.php?page=<?=$i;?>&amp;search=<?=$s;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="searching.php?page=<?=$Next;?>&amp;search=<?=$s;?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- LATEST MOVIES SECTION -->



	<div class="row">

	

			<?php
                        if(mysqli_num_rows($query_run1) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run1))
                            {
                               

                ?>

                    <div class="col-md">
						<div class="card">
							<div class="poster"><img src="<?php  echo $row['imagelink']; ?>"></div>
						<a href="detail.php?did=<?php echo $row['id_movies'] ?> ">
							<div class="details">
								<h2> <?php  echo $row['title']; ?> <br><span><?php  echo $row['director']; ?></span></h2>
								<div class="rating">
									<span>Rating: <?php  echo $row['rating']; ?></span>
								</div>
<!-- 								<div class="tags">
									<span class="fantasy">Fantasy</span>
									<span class="action">Action</span>
									<span class="superHero">Super Hero</span>
								</div> -->

								<div class="info">
									<p> <?php  echo $row['description']; ?></p>
								</div>

								<div class="star">
								</div>
							</div>
		                    

                	     </a>
						</div>
					</div>




			<?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>



	</div>

	<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="searching.php?page=<?=$Previous;?>&amp;search=<?=$s;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="searching.php?page=<?=$i;?>&amp;search=<?=$s;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="searching.php?page=<?=$Next;?>&amp;search=<?=$s;?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>









	<?php
	include('includes/footer.php');
	?>