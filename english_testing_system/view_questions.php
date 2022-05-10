<!-- manage question bank -->

<?php
	include('admin_header.php');
	include_once ('class/class.php');
	$exam = new Exam(); // 此处数据库会自动连接
?>


<?php 
	if(isset($_GET['question_to_delete'])){
		$question_no = (int)$_GET['question_to_delete'];
		$question_to_delete = $exam->delete_question_by_number($question_no);
	}
?>



<div class="main">

	<h1></h1>

	<?php
		if(isset($question_no)){
			echo $question_no;
		}
	?>

			<table>	
			<tr><th width = "10%">#</th><th width = "70%">QUESTION</th><th width = "20%">ACTION</th></tr>


	<?php	
		$question_by_order = $exam->question_by_order();	

		if($question_by_order){
			$i = 0;
			while($question_row_by_order = $question_by_order->fetch_assoc()){
			$i++;
	?>
			<tr>
				<td style="text-align: center;"><?php echo $i; ?></td>
				<td><?php echo $question_row_by_order['question_title']; ?></td>
				<td style="text-align: center;"><a style="text-decoration: none;" onclick = "return confirm('Are you sure to delete this question?')" href = "?question_to_delete=<?php echo $question_row_by_order['question_no']; ?>"><button class="button">DELETE</button></a></td>
			</tr>
	<?php 	
			} 
		}
	?>	
			</table>
</div>


<?php
include ("footer.php"); 
?>
