
<?php require("partial/head.php"); ?>
	<h1 id='heading_sty'>REGISTRATION</h1>

	 <div>

    	<?php 
		if (!empty($msgs)) {	
			if($msgs == "success") {
				echo "<div class='alert alert-warning log_reg_div_sty' role='alert'><span class='form-error'>Registartion Successful <a href='login'>LOGIN</a></span></div>";
			}else {
				echo "<div class='alert alert-warning log_reg_div_sty' role='alert'><span class='form-error'>".$msgs."</span></div>";
				foreach ($infos as $info) {
					$info['username'];
					$info['email'];
					$info['name'];
				}
			}
		}
			
		 ?>
    	

    </div><br>
	<form method="POST" action="/register">
		<div id="compress">
			<div class="form-group">
				<input class="form-control" type="text" name="username" value="<?php  echo $info['username'] ?>" placeholder="Username">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" value="" placeholder="Password">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="retypepassword" value="" placeholder="Retype Password">
			</div>
			<div class="form-group">
				<input class="form-control" type="email" name="email" value="<?php  echo $info['email'] ?>" placeholder="Email">
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="name" value="<?php  echo $info['name'] ?>" placeholder="Name">
			</div>
			<div class="form-group">
				<p id="link_out_sty">Already have an account!<a href="login"> Login Here</a></p>
			</div>	
			<div class="form-group">
				<input class="form-control btn_drive" type="submit" name="submit" value="Register">
			</div>	
		</div>
	</form>

<?php require("partial/footer.php"); ?>