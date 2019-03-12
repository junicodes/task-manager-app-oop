
<?php require("partial/head.php"); ?>
<?php require("add_task.php"); ?>
<?php require("confirm_task.php"); ?>
<?php require("delete_task.php"); ?>

		<div>
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<div id='welcome_sty'>
							<h1>Welcome! @".$_SESSION['username'].", to your task manager web app</h1>
						  </div>";
				 }else{
				 	echo "<div id='welcome_sty'>
							<h1>Welcome! You need to be Logged in to see your Task's</h1>
						  </div>";
				}
			?>
		</div>

		<h1 id='heading_sty'>YOUR TASKS</h1>
		<!--display user task here-->
		<div id="task_sty"><?php require("tasks_list.php"); ?></div>

<div>
	
</div>
<?php require("partial/footer.php"); ?>