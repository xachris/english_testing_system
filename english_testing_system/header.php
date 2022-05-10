<!-- Insert header to current page -->

<?php 
    session_start();
?>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home English Test</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/test.css">
</head>


<div>
	<ul class="topnav">
	<?php
		if (isset($_SESSION['logged_in']) == 1){

	?>

		<li><a class="active" href="index.php">HOME</a></li>
		<li><a href="profile.php">PROFILE</a></li>	
		<li><a href="logout.php">LOGOUT</a></li>
	<?php 
		}
		else { 
	?>
		<li><a class="active" href="index.php">HOME</a></li>
		<li><a href="index.php#login">LOGIN</a></li>
		<li><a href="index.php#signup">SIGNUP</a></li>
	<?php 
		} 
	?>
	</ul>
</div>