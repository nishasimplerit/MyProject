<?php
include "header.php";
?>
<head>
<link href="../css/login_form.css" rel="stylesheet"> </head>

		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="login.php" method="post">
					<span class="login100-form-title p-b-70">
						Welcome back!!
					</span>
					
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input type="text" class="input100" type="text" name="input_uname" title="Username or email" placeholder="Username" id="signin-username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						
						<input type="password" id="signin-password" class="input100"  name="input_pword" title="Password"name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


