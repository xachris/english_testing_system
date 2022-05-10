<!-- View correct answers -->

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




<?php 
	// Session::checkSession();
	$question_num_rows = $exam->question_num_rows();  
	$question_by_order = $exam->question_by_order();
?>



<div class="main">


<p class="center">Total Questions: <?php echo $question_num_rows; ?></p>

	<div class="center">

		<table>
		<?php
			$question_by_order = $exam->question_by_order();
			if($question_by_order){
				while($question_row_by_order = $question_by_order->fetch_assoc()){			
		?>
					<tr><td colspan="2">
					<p><?php echo "<br/>".$question_row_by_order['question_no']; ?>. <?php echo $question_row_by_order['question_title']; ?></p>
					</td></tr>
			
		<?php 			
			$question_no = $question_row_by_order['question_no'];			
			$answer_by_number = $exam->answer_by_number($question_no);
			
			if($answer_by_number){
					while($answer_row_by_number = $answer_by_number->fetch_assoc()){
			?>
					<tr><td>	
		<?php 
						if($answer_row_by_number['is_correct'] == 1){
		?>
						<input type="radio" checked/>
		<?php 
							echo "<span style='background-color: #fae196;'>".$answer_row_by_number['answer_title']."</span>";
						}else{
		?>
						<input type="radio" />
		<?php
							echo $answer_row_by_number['answer_title'];
						}					
		?>
						</td></tr>
		<?php 
					} 
			} 
		?>
		
		<?php 
				} 
			} 
		?>
		</table>

		<a href="begin_test.php"><button class="button" name="begintest" style="background: #fae196; height: 50px;border-style: solid; border-color: grey; border-size: 4px; font-size: 20px; margin-top:20px;"/>RETAKE THE TEST</button></a>
	</div>
</div>

<?php
include ("footer.php"); 
?>
