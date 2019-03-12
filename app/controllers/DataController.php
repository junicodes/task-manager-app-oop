<?php
 $time =  time();
 $time_current = date('h:i A', $time+3600);
 $date_current = date('Y-m-d', $time+3600);
//veiw succes msg r error msg from the inserting of the task
	if ($this->key_passage == 'task_data') {
		echo json_encode($datas);
	}
//update msg pass to view
	if ($this->key_passage == 'update_status') {

		if (empty($datas)) {
			echo "<div id='sucess_output' class='alert alert-success for_confirm_sty' role='alert'>
					<span class='form-error'>Task successfully Completed</span>
					&nbsp;<span id='close_confirm_task'>Close</span>
			     </div>";
		}else{

			echo "<div id='error_output' class='alert alert-warning for_confirm_sty' role='alert'>
			     	<span id='error_output_msg' class='form-error'>".$datas."</span>
			     	&nbsp;<span id='close_confirm_task'>Close</span>
			      </div>";	
		}
		
	}

//Delete Task pass to view
	if ($this->key_passage == 'delete_task_data') {
		echo $datas;
	}
// emit the task to the user 	
	if ($this->key_passage == 'emmit_task_data') {

				if (isset($_SESSION['username'])) { ?>

				<table class="table table-dark">
						  <thead>
						    <tr class="heading_table">
						      <th scope="col">No.</th>
						      <th scope="col">Title</th>
						      <th scope="col">Description</th>
						      <th scope="col">Created Time</th>
						      <th scope="col">Due date</th>
						      <th scope="col">Status</th>
						      <th scope="col">Confirm</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <tbody>
		        	<?php 
		        	    if ($datas) {
		        		  $counter = 0;
		        		  
		        		  foreach ($datas as $data) {

			     			$output_task_id  		  = $data->task_id;
							$output_task_title  	  = $data->task_title;
							$output_task_description  = $data->task_description;
							$output_time    	      = $data->task_time;
							$output_date              = $data->task_date;	
							$output_status           = $data->status; 

							 $counter++; 
							 if ($output_status == 0) {
							 	   $output_status  = "<li id='status_sty' style='color:red;'>Not completed</li>";

							  }else {
							  	   $output_status  = "<li id='status_sty' style='color:green;'>Completed</li>";
  
							  }

							 if ($time_current > $output_time && $date_current > $output_date || $date_current > $output_date) {
							 								 	
   								$output_time =  "<li id='status_sty' style='color:green; background:red; color:white;'>".$output_time."</li>";

   								$output_date =  "<li id='status_sty' style='color:green; background:red; color:white;'>".$output_date."</li>";
							  }else{
							  	$output_time =  "<li id='status_sty' style='color:green; background:lightgrey; color:black;'>".$output_time."</li>";

							  	$output_date =  "<li id='status_sty' style='color:green; background:lightgrey; color:black;'>".$output_date."</li>";
							  }
							
				  	?>
						    <tr class="elasped_period">
							      <th scope="row"><?= $counter; ?></th>
							      <td style='font-weight:bold;'><?= $output_task_title;?></td>
							      <td><?= $output_task_description; ?></td>
							      <td><?= $output_time; ?></td>
							      <td><?= $output_date; ?></td>
							      <td><?= $output_status; ?></td>
							      <td><button class="confirm_btn" data-totask_id='<?= $output_task_id ?>'>Confirm</button></td>
							      <td><button class="delete_btn" data-totask_id='<?= $output_task_id ?>'>Delete</button></td>
						    </tr>
						 

					<?php } }else{ ?>
						<tr>
					      <td>
					      	<p id="loading_trick"> You do not have any recent task! <span class="task_pop_window" id='task_pop_window3'>Add a Task</span></p>
					      </td>
					    </tr>

					<?php } ?>

				 </tbody>
				</table>

	  <?php } }	?>

