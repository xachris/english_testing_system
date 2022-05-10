<!-- Manage users -->

<?php
	include ('admin_header.php');
	include_once ('class/class.php');
	$user = new User();
?>



<?php 
	if(isset($_GET['disabled_user_id'])){
		$disabled_user_id = (int)$_GET['disabled_user_id'];
		$disable_user = $user->disable_user($disabled_user_id);
	} 

	if(isset($_GET['enabled_user_id'])){
		$enabled_user_id = (int)$_GET['enabled_user_id'];
		$enable_user = $user->enable_user($enabled_user_id);
	}
	
	if(isset($_GET['deleted_user_id'])){
		$deleted_user_id = (int)$_GET['deleted_user_id'];
		$delete_user = $user->delete_user($deleted_user_id);
	}
?>


<div class="main">

	<div>
	<h1 align="center">User List</h1>

	<?php 
		if(isset($disable_user)){
			echo $disable_user;
		}
		if(isset($enable_user)){
			echo $enable_user;
		}
		if(isset($delete_user)){
		echo $delete_user;
		}
	?>



			<table align="center">

			<tr>
				<th width = "5%">#</th>
				<th width = "10%">FN</th>
				<th width = "10%">LN</th>
				<th width = "30%">Email</th>
				<th width = "15%">Action</th>
			</tr>


	<?php 

	$user_array = $user->user_array();
	
	if($user_array){
		$i = 0;
		while($user_row_array = $user_array->fetch_assoc()){
			$i++;
	?>


			<tr>
				<td align="center">
				<?php 
				if($user_row_array['is_active'] == 1){
					echo "<span class = 'error'>".$i."</span>";
				}else{
					echo $i; 
				}
				?>
				</td>

				<!-- 姓名 -->
				<td align="center">
				<?php 
				if($user_row_array['is_active'] == 1){
					echo "<span class = 'error'>".$user_row_array['user_first_name']."</span>";
				}else{
					echo $user_row_array['user_first_name'];
				}
				?>
				</td>

				<td align="center">
				<?php 
				if($user_row_array['is_active'] == '1'){
					echo "<span class = 'error'>".$user_row_array['user_last_name']."</span>";
				}else{
					echo $user_row_array['user_last_name'];
				}
				?>
				</td>

				<td align="left">
				<?php 
				if($user_row_array['is_active'] == '1'){
					echo "<span class = 'error'>".$user_row_array['user_email']."</span>";
				}else{
					echo $user_row_array['user_email'];
				}
				?>
				</td>

				<td align="center">
					<?php  if($user_row_array['is_active'] == 1){ ?>
							
						<a onclick = "return confirm('Are you sure to Disable')" href = "?disabled_user_id=<?php echo $user_row_array['user_id']; ?>"><button class="button" style="width:100px;">DISABLE</button></a>
					<?php } else {?>
					
						<a onclick= "return confirm('Are you sure to Enable')" href = "?enabled_user_id=<?php echo $user_row_array['user_id']; ?>"><button class="button" style="width:100px;">ENABLE</button></a>
					<?php } ?>
					 <br/><a onclick = "return confirm('Are you sure to Remove')" href = "?deleted_user_id=<?php echo $user_row_array['user_id']; ?>"><button class="button" style="width:100px;">DELETE</button></a>
				</td>


			</tr>


	<?php } } ?>
			</table> 


		<div/>
</div>
</div>
</div>


<?php
include ("footer.php"); 
?>



