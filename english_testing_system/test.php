<!-- Main page for student to take exam -->


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

<!-- 导航栏列表 -->
<div>
    <ul class="topnav">
    <?php
        if (isset($_SESSION['logged_in']) == 1){

    ?>

        <li><a class="active" href="index.php">HOME</a></li>
        <li><a href="profile.php">PROFILE</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
        <li class="right"><a id="timer"></a></li>
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


<?php
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

<?php
    if(!isset($_SESSION['end_time_milli'])){
        $_SESSION['end_time_milli'] = round(microtime(true)*1000) + 60000*5;
    }
?>

<!-- Countdown timer -->
<script>

var countDownDate = <?php echo $_SESSION['end_time_milli']; ?>

var x = setInterval(function() {

  var now = new Date().getTime();
  var distance = countDownDate - now;
     
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  document.getElementById("timer").innerHTML = minutes + ":" + seconds;
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "<span style='color: red; font-weight:bold;'>Time is up! You have 5 seconds to save your data.</span>";
    setTimeout(function() {
        window.location.href = "test_result.php";          
    }, 5000);  
  }
}, 1000);


</script>



<?php
$question_num_passed_in = 1;
$question_num_rows = $exam->question_num_rows();   	
$question_row_by_number = $exam->question_row_by_number($question_num_passed_in);
$answer_by_number = $exam->answer_by_number($question_num_passed_in);
$answer_row_by_number;
$score_and_move; // 会创造SESSION[score]全局变量

$exam_code = "tpo40";
$exam_row_by_code = $exam->exam_row_by_code($exam_code);
?>

<?php
	if(isset($_GET['q'])){
		$question_num_passed_in = (int) $_GET['q'];
	}else{
		echo "No question number passed in.";
		header("Location:profile.php");
	}
?>

<?php
	$question_num_rows = $exam->question_num_rows();   	
	$question_row_by_number = $exam->question_row_by_number($question_num_passed_in);
	$answer_by_number = $exam->answer_by_number($question_num_passed_in);
?>



<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST) && !empty($_POST) ){
            $score_and_move = $exam->score_and_move($_POST);     
        $_POST=array(); 
        } 
    }
?>

<style>

</style>


<body>

<div class="leftcolumn">
	<p class="center">
  	Question <?php echo $question_row_by_number['question_no']; ?> of <?php echo $question_num_rows; ?>  	
  	</p>
  <div class="test">
    <form method="post" action="">
        <table>
            <tr><td>
            <p><?php echo $question_row_by_number['question_no']; ?>. <?php echo $question_row_by_number['question_title']; ?></p>
            </td></tr>
			<?php
                $answer_by_number = $exam->answer_by_number($question_num_passed_in);
                if($answer_by_number){
					while($answer_row_by_number=$answer_by_number->fetch_assoc()){
            ?>
            <tr><td>
            <input type="radio" name="answer_id" value="<?php echo $answer_row_by_number['answer_id']; ?>"/><?php echo " ".$answer_row_by_number['answer_title']; ?>
            </td></tr>
            <?php 
                    } 
                } 
            ?>
			<tr><td>
            <input type="submit" name="submit" value="NEXT"/>
			<input type="hidden" name="question_num_passed_in" value= "<?php echo $question_num_passed_in; ?>"/>
			</td></tr>
        </table>
    </form>
    </div>
</div>


<div class="rightcolumn">
	
	<p class="center">
	<?php echo $exam_row_by_code["exam_text_title"]."<br/>"; ?>
	</p>
	<?php echo $exam_row_by_code["exam_text"]."<br/>"; ?>

</div>


<?php
include ("footer.php"); 
?>


