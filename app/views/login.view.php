
<?php require("partial/head.php"); ?>

	<h1 id='heading_sty'>LOGIN HERE</h1>
	<div>
		<?php 
			if (!empty($msgs)) {	
					echo "<div class='alert alert-warning log_reg_div_sty' role='alert'><span class='form-error'>".$msgs."</span></div><br>";
					foreach ($infos as $info) {
						$info['username'];
					}
			}
			
		 ?>
    	
	</div>

	<form method="POST" action="/login">
		<div id="compress">
			<div class="form-group">
				<input type="text" class="form-control" name="username" value="<?php echo $info['username'] ?>" placeholder="Username">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				
			</div>
			<div class="form-group">
				<p id="link_out_sty">Don't have an account!<a href="register"> Register Here</a></p>
			</div>	
			<div class="form-group">
				<input type="submit" class="form-control btn_drive" name="submit" value="Login">
			</div>	
		</div>
	
		
	</form>

<?php require("partial/footer.php"); ?>
