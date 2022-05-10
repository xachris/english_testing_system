<!-- Add a question to database -->

<?php
	include ('admin_header.php');
	include_once ('class/class.php');
	$exam = new Exam();
?>


<?php
$add_question_by_post;
$question_num_rows;
$question_no;
?>



<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$add_question_by_post = $exam->add_question_by_post($_POST);
	}
	$question_num_rows = $exam->question_num_rows();
	$question_no = $question_num_rows + 1;
?>



<div class="main">

	<div style="width:400px; margin-left:auto; margin-right:auto; text-align: center;">

	<h1>Add New Question</h1>


<?php 
	if(isset($add_question_by_post)){
		echo $add_question_by_post;
	}
?>

		<form action = "" method = "post">

		<table align="center"> 

			<tr>
				<td align = "right">No.</td>
				<td> </td>
				<td><input type = "number" min="1" max="20" value="<?php if(isset($question_no)){echo $question_no;}else{echo 0;} ?>" name ="question_no" style="width:60px; height:35px; border-style:solid; border-width: 4px; border-color:#ddd; background-color: white; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px;" /></td>
			</tr>
			

			<tr>
				<td align = "right">Question</td>
				<td> </td>
				<td>
				<textarea name="question_title" rows="3" cols="35" required style="border-style:solid; border-width: 4px; border-color:#ddd; ">Enter your question here</textarea></td>
			</tr>
			
			
			<tr>
				<td align = "right">1st Option</td>
				<td> </td>

				<td>
				<textarea name="answer_1" rows="3" cols="35" required style="border-style:solid; border-width: 4px; border-color:#ddd; ">Enter your question here</textarea></td>
			</tr>
			
			
			<tr>
				<td align = "right">2nd Option</td>
				<td> </td>

				<td>
				<textarea name="answer_2" rows="3" cols="35" required style="border-style:solid; border-width: 4px; border-color:#ddd; ">Enter the second option here</textarea></td>
			</tr>

			
			<tr>
				<td align = "right">3rd Option</td>
				<td> </td>

				<td>
				<textarea name="answer_3" rows="3" cols="35" required style="border-style:solid; border-width: 4px; border-color:#ddd; ">Enter the third option here</textarea></td>
			</tr>

			
			<tr>
				<td align = "right">4th Option</td>
				<td> </td>

				<td>
				<textarea name="answer_4" rows="3" cols="35" required style="border-style:solid; border-width: 4px; border-color:#ddd; ">Enter the fourth option here</textarea></td>
			</tr>
			
			<tr>
				<td align = "right"><label for="correct_answer_code">Key to Question</label></td>
				<td> </td>
				<td>
				<select name="correct_answer_code" required style="width:60px; height:35px; border-style:solid; border-width: 4px; border-color:#ddd; background-color: white; font-size: 20px; text-align: center; border-radius: 10px 10px 10px 10px;">
				  <option value="a">a</option>
				  <option value="b">b</option>
				  <option value="c">c</option>
				  <option value="d">d</option>
				</select>
				</td>


			</tr>
			
			<tr>
				<td colspan = "3" align = "center" >
				<input type = "submit" value = "Add A Question"/>
			   </td>
			</tr>

		</table>
		</form>
	</div>


</div>

<?php
include ("footer.php"); 
?>


