<?php include 'inc/header.php';
// include 'config/config.php';
$con=mysqli_connect("localhost","root","","db_exam"); ?>
<?php 
date_default_timezone_set("Asia/Kolkata");
$cdate =date("h:i:s A");

$email=$_SESSION['email'];

$sql="UPDATE tbl_user
SET ctime = '$cdate'
WHERE email = '$email'";
	
mysqli_query($con,$sql);
	Session::checkSession();
// include('config/config.php');



?>
<style>
	.starttest a{
		font-family: "Times New Roman", Georgia, Serif;
		font-size: 25px;
		color:#121069;
	}
</style>
<div class="main">
<h1>You are Done    !</h1>
	<div class="starttest">
	<p>Congratulations ! You have just Completed the test.</p>
	<p>Final Sore : 
		<?php
		
			if(isset($_SESSION['score'])){

			$sc=$_SESSION['score'];
		$email = $_SESSION['email'];
		
		
	
				$sql="UPDATE  tbl_user
				SET cans = '$sc' where email='$email'
				";
				mysqli_query($con,$sql);
				
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}
		?>
	</p>
	<!-- <a href="viewans.php">View Correct Answer</a> -->
	<a href="starttest.php">Again Start Test!!!!</a>
	</div>
  </div>
<?php include 'inc/footer.php'; ?>