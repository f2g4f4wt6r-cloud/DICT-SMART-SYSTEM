<?php
	include('config.php');

	session_start();
	
	$username = $_SESSION['uname'];

	$sql = mysqli_query($conn, "SELECT * FROM accounts  WHERE Username='$username'");
	$rows = mysqli_fetch_array($sql);
	$fname = $rows['FirstName'];
	$access = $rows['AccessLevel'];
	$login_email = $rows['EmailAd'];
	$lname = $rows["LastName"];
    date_default_timezone_get();
    $datepaid=date('Y-m-d H:i:s');

?>