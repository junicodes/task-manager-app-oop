    

	<div id='delete_output' class='alert alert-success error_div_sty' role='alert'>
		<span class='form-error'>Task successfully deleted</span>
		&nbsp;<span id="close_del_task">Close</span>
     </div>


	<div id="delete_task" class="animated fadeIn">
		<div id="close_bracket"><span id="close_del_task">Close</span></div>

		<form method="POST" action="task" id="delete_task_form">
			<div id="task_adjust">
				<div class="form-group" id="form_grab">
					<h3>Are you sure you want to delete this task!</h3>
				</div>
				<div class="form-group share_div" >
				
					<div id="yes_del_div">
						<label for="yes_confirm"><h2 class="choose_sty">YES</h2></label>
						<input class="form-control hide_check_box" id='yes_delete' type="checkbox" value="">
					</div>
					<div id="no_div">
						<label for="no_delete"><h2>NO</h2></label>					
					</div>
					
				</div><br><br><br>

				<div class="form-group" id="form_grab">
					<input id="del-btn" class="form-control btn_drive" type="submit" value="Delete" disabled="disabled">
				</div>	

			</div>
		</form>
	</div>

