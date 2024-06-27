<!DOCTYPE html>
<html lang="en">

<head>
	<title>Thể Loại:</title>


	<?php
	include('security.php');
	include('includes/header.php'); 
	include('includes/navbar.php'); 
	?>

	<?php 
	$tagid = $_GET['tagid'];

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
		where tl.id = '$tagid'
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
		where tl.id = '$tagid'
		group by m.id_movies
		order by m.date desc
		LIMIT $start, $limit";


		$query1 = $str1;

		$query_run1 = mysqli_query($connection, $query1);

	$row = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $connection->query("SELECT count(movies_id) AS movies_id FROM movies_tags WHERE tags_id='$tagid'");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['movies_id'];
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
						<a class="page-link" href="catalog.php?page=<?=$Previous;?>&amp;tagid=<?=$tagid;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="catalog.php?page=<?=$i;?>&amp;tagid=<?=$tagid;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="catalog.php?page=<?=$Next;?>&amp;tagid=<?=$tagid;?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- LATEST MOVIES SECTION -->



	<div class="row">
<!-- 		<?php
		foreach($row as $row) : 
			// echo "<div class='pro'>";
			// echo "<h3>$row[title]</h3>";
			// echo "Tac Gia: $row[author] - Gia: $row[price].000VND<br />";

			// echo "</div>";


								$did[$i] = $row['id_movies'];
                                $dtitle[$i]= $row['title'];
                                $dtags[$i] = $row['tags'];



			?> --> 

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










			<!-- <div class="col-md">
				<div class="card">
					<div class="poster"><img src="<?php  echo $row['imagelink']; ?>"></div>
					<div class="details">
						<h2> <?php  echo $row['title']; ?> <br><span><?php  echo $row['director']; ?></span></h2>
						<div class="rating">
							<span>Rating: <?php  echo $row['rating']; ?></span>
						</div>
						<div class="tags">
							<span class="fantasy">Fantasy</span>
							<span class="action">Action</span>
							<span class="superHero">Super Hero</span>
						</div>

						<div class="info">
							<p> <?php  echo $row['description']; ?></p>
						</div>

						<div class="star">
						</div>
					</div>
				</div>
			</div> -->

			<?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                ?>

<!-- 			<?php  
		endforeach;

		?> -->

	</div>

	<div class="row">
		<div class="col-md-12">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="catalog.php?page=<?=$Previous;?>&amp;tagid=<?=$tagid;?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Previous</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a class="page-link" href="catalog.php?page=<?=$i;?>&amp;tagid=<?=$tagid;?>"><?= $i; ?></a></li>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="catalog.php?page=<?=$Next;?>&amp;tagid=<?=$tagid;?>" aria-label="Next">
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