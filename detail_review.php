<!DOCTYPE html>
<html lang="en">

<head>
	<title>R</title>


	<?php
	include('security.php');
	include('includes/header.php'); 
	include('includes/navbar.php'); 
	?>
	<div class="container">
  <div class="hero-section">
	<?php 
	$id_review = $_GET['id_review'];
	$str1 = "SELECT * FROM review where id_review = '$id_review'";


		$query1 = $str1;

		$query_run1 = mysqli_query($connection, $query1);


                        if(mysqli_num_rows($query_run1) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run1))
                            {
                            	echo $row['content'];
                              ?>  


						<?php 
			               }
			             }

					     ?>

					 </div>
</div>









	<?php
	include('includes/footer.php');
	?>