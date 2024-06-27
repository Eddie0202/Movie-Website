<html>
<head>
	<title>LOGIN</title>
<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>

     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <nav class="home-nav">
        <a href="change-password.php">Change Password</a>
        <a href="logout.php">Logout</a>
     </nav>


<?php
}else{
     header("Location: index.php");
     exit();
}

include('includes/footer.php');
?>