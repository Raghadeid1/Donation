<!doctype html>
<html>
	<head>
		<title>LSA Project</title>

		<script type="text/javascript" src="<?php echo BASEPATH; ?>public/js/application.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/style.css" />
			

	</head>
	<body>

		<div class="header">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<ul class="nav navbar-nav navbar-right">
						<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu notifyWidth"></ul>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
		
		<div id="content">
			<?php 
				include 'mainmenu.php'; 
			?> 
			<div class="container">
		
	