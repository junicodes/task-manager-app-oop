<?php
if (!isset($_SESSION['username'])) 
    {
        userView('login');
    } 
?>
<?php require("partial/head.php"); ?>
<?php require("add_task.php"); ?>

	<h1 id='heading_sty'>Your Profile</h1>

	<div>
		<?php 
			if (isset($_SESSION['username']))
			{
				echo "<div id='welcome_sty'><h1>Welcome! @".$_SESSION['username'].", to your task manager web app<h1><div>";
			}
		?>
	</div>
<?php require("partial/footer.php"); ?>

