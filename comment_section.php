<?php 


error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
 // Get Name from form
	if(isset($_SESSION['user_name'])){
		$name = $_SESSION['user_name'];
		$user_id = $_SESSION['id'];
		// $email = $_POST['email'];
		$comment = $_POST['comment']; // Get Comment from form
		$comment_date = date('Y-m-d H:i:s');
		$movies_id = $_POST['did'];



		$sql = "INSERT INTO comment (name, comment, comment_date, user_id, movies_id )
				VALUES ('$name', '$comment', '$comment_date', '$user_id', '$movies_id')";
		$result = mysqli_query($connection, $sql);
		if ($result) {
			echo "<script>alert('Comment added successfully.')</script>";
		} else {
			echo "<script>alert('Comment does not add.')</script>";
		}
	}else{
		$message = "Bạn chưa đăng nhập";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


 		// Get Email from form
	
}

?>


<div>
	<div class="row col-md-12">
		<div class="container">
			<h3>Bình luận</h3>
			<div class="d-flex justify-content-center row">
				<div class="col-lg-12">
					<div class="d-flex flex-column comment-section">
						<form action="" method="POST" class="form">
							<div class="input-group textarea">
								<div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="images/blank.jpg" width="40">
									<textarea rows="3%" cols="100%" id="comment" name="comment" class="form-control ml-1 shadow-none textarea" placeholder="Đăng nhập để bình luận" required></textarea>
								</div>
							</div>
							<input hidden type="text" name="did" value="<?php  echo $did; ?>"></br>
                            <input hidden type="text" name="dtitle" value="<?php  echo $dtitle; ?>"></br>
                            <input hidden type="text" name="dtags" value="<?php  echo $dtags; ?>"></br>
							<div class="input-group">
								<button name="submit" class="btn btn-primary btn-sm shadow-none">Đăng bình luận</button>
							</div>
						</form>


						<?php 
								$movies_id = $did;
								$movies_title = $dtitle;


							$sql = "SELECT *
									FROM comment
									where movies_id = '$movies_id'
									ORDER BY comment_date desc";

							$result = mysqli_query($connection, $sql);
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {

						?>
									<div class="bg-white p-2" style="margin-top: 0px; border-top:1px; border-left:1px; border-right:1px; border-bottom:0px; border-style:solid; border-color:black;" style="padding: 10%">
										<div class="d-flex flex-row user-info"><img class="rounded-circle" src="images/blank.jpg" width="40">
											<div class="d-flex flex-column justify-content-start ml-2" >
												<span class="d-block font-weight-bold name" style="font-size:15px; padding-top:5%; color: black"><?php echo $row['name']; ?></span>
												<span class="date text-black-50">Đã bình luận vào: <?php echo $row['comment_date']; ?></span>
											</div>
										</div>

										<div class="mt-2" style="border-width:1px; border-style:thin; border-color:black;">
											<p class="comment-text" style="padding-left:5%; color: black"><?php echo $row['comment']; ?></p>
										</div>
									</div>
						<?php

								}
							}
						
						?>



					</div>
				</div>
			</div>
		</div>
	</div>



	

</div>



