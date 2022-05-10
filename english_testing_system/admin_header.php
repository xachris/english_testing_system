<!-- Insert header to all admin pages -->

<?php 
    session_start();

	include_once ('class/class.php');
	$exam = new Exam();

    if ($_SESSION['logged_in'] != 1)
    {
        $_SESSION['message'] = "<div class='info-alert'>You must log in before viewing your profile page!</div>";
        header("location: error.php");    
    }
    else if ($_SESSION['email'] != 'admin@admin.com')
    {
        header("location: profile.php");
    }
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
	<title>Admin Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/test.css">
</head>


<div>
	<ul class="topnav">
	<li><a class="active" href="admin.php">ADMIN</a></li>
	<li><a href="view_users.php">VIEW USERS</a></li>
	<li><a href="add_questions.php">ADD QUESTIONS</a></li>
	<li><a href="view_questions.php">VIEW QUESTIONS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
	</ul>
</div>