    


      <div id='holder'></div>
				
	
	<div id="confirm_task" class="animated fadeIn">
		<div id="close_bracket"><span id="close_confirm_task">Close</span></div>

		<form method="POST" action="task" id="confirm_task_form">
			<div id="task_adjust">
				<div class="form-group" id="form_grab">
					<h3>Are you sure this tasks is completed!</h3>
				</div>	
				<div class="form-group share_div" >
					<div id="yes_div">
						<label for="yes_confirm"><h2 class="choose_sty">YES</h2></label>
						<input class="form-control hide_check_box" id='yes_confirm' type="checkbox" value="">
					</div>
					<div id="no_div">
						<label for="no_confirm"><h2 class="choose_sty">NO</h2></label>					
					</div>
					
				</div><br><br><br>
				<input class="form-control" id='status' type="hidden" value="1">
				<div class="form-group" id="form_grab">
					<input id="confirm-btn" class="form-control btn_drive" type="submit" value="Confirm" disabled="disabled">
				</div>	

			</div>
		</form>
	</div>

