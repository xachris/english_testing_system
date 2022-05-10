<!-- Prepare the student for the test -->

<?php
include ("header.php"); 
include_once ("class/class.php");
?>


<?php

    if ($_SESSION['logged_in'] != 1)
    {
        $_SESSION['message'] = "<div class='info-alert'>You must log in before viewing your profile page!</div>";
        header("location: error.php");    
    }
    else if ($_SESSION['email'] == 'admin@admin.com')
    {
        header("location: admin.php");
    }
?>

<?php
    unset($_SESSION['end_time_milli']);
?>






<div class="main">
	<div class="center vertical">

	<h1>Welcome to your test</h1>

	<a href="test.php?q=1"><button class="button" name="begintest" style="background: #fae196; height: 50px;border-style: solid; border-color: grey; border-size: 4px; font-size: 20px;"/>CLICK HERE TO BEGIN</button></a>

	</div>

</div>

<?php
include ("footer.php"); 
?>