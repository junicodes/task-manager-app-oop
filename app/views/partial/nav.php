

<nav class="nav_link">
	<ul>
		<li><a href="/">Task</a></li>

		<li><a href="about">About</a></li>

		<li><a href="contact">Contact</a></li>
		<?php
		if (isset($_SESSION['username'])) {
			echo "<li><a href='profile'>Profile</a></li>";
		}
		
		?>

		<?php
		if (isset($_SESSION['username'])) {
			echo "<li><a href='logout'>Logout</a></li>";
		}else{
			echo "<li><a href='login'>Login</a></li>";
		}
		
		?>
		
		<?php
		if (isset($_SESSION['username'])) {
			echo "<li><a id='task_pop_window'>Add Task</a></li>";
		}else {
			echo "<li><a href='register'>Register</a></li>";
		}
		
		?>
	</ul>
</nav>