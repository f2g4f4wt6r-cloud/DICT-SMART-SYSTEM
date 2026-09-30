<?php
	include('config.php');
	
	//session_start();

	$username = $_SESSION['uname'];

	$sql_check = mysqli_query($conn, "SELECT * FROM accounts WHERE UserName='$username' AND Accesslevel='Employee'");
	$row_check = mysqli_fetch_array($sql_check);
	$login_profile = $row_check['Image'];
	$access = $row_check['AccessLevel'];
	$login_email = $row_check['EmailAd'];
	$acctname = $row_check["FirstName"];
	$lastname = $row_check["LastName"];
	$status = $row_check["Status"];
	$idno = $row_check["ID_No"];
	$accountID = $row_check["ID"];
	$gender = $row_check["Gender"];

	if(!isset($acctname)){	
		header("Location: login.php");
	}
?>