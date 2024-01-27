<?php include('include/logindoctorheader.php'); ?>

<html>
<head>
	</head>
	<body>		
	
				<div class="welcome_header">
					<mark>
					<?php
						echo "Welcome " .$_SESSION["name"] ;
					?>
					
					
				</mark>
				<!-- 	<div class="clearance"></div>
			<!--		<div class="notifications">
				<!--		<?php
							display_notification($_SESSION["username"]);
						?>
				-->		
				</div> -->
				
			</div>
		</div>
	</body>
</html>
