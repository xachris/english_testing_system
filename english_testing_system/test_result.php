<!-- View test result -->

<link rel="stylesheet" href="css/test.css">

<?php
include ("header.php"); 
include_once ("class/class.php");
$exam = new Exam();
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



<div class="main">

		<div class="center vertical">

		<h1>End of Test</h1>

		<h2>Your score is: 

			<?php
				if(isset($_SESSION['score'])){
					echo $_SESSION['score'];
					// unset($_SESSION['score']);
				}
			?>
		</h2>

		<a href="view_answers.php"><button class="button">VIEW ANSWERS</button></a>
		<a href="begin_test.php"><button class="button">RETAKE THE TEST</button></a>

		</div>
</div>

<?php
include ("footer.php"); 
?>