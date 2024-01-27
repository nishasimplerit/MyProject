<?php include('include/loginpatientheader.php'); ?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
	</head>
	<body>
	
		
		<div class="banner-container">
			<div class="headbanner"></div>
		</div>
		
		<div class="content_wrapper">
			<div class="content_main">
				<div class="welcome_header">
					<?php
						echo "Welcome " .$_SESSION["name"] ;
					?>
					
					</div>
					<div class="clearance"></div>
			<!--		<div class="notifications">
				//	<?php
							display_notification($_SESSION["username"]);
						?>
				-->		
					</div>
				
			</div>
		</div>
	</body>
</html>