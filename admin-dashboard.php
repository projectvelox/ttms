<?php 
	include('session.php');
	include('config.php');

	if(!isset($_SESSION['login_user'])){
	  header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Taekwondo Tournament Matching System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- The Navigation Bar -->
	<nav class="navbar navbar-inverse navbar-fixed-top"> 
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Taekwondo | TMS</a>
	    </div>
	    <div id="navbar"  class="navbar-collapse collapse navbar-right">
	      	<ul class="nav navbar-nav">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo "$login_fullname"?> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="admin-dashboard.php">Dashboard</a></li>
		            <li role="separator" class="divider"></li>
		            <li class="dropdown-header">Account</li>
		            <li><a href="account-settings.php">Settings</a></li>
		            <li><a href="logout.php">Logout</a></li>
		          </ul>
		        </li>
	        </ul>
	    </div>
	  </div>
	</nav>

	<!-- Under the Nav Bar | The Dashboard -->
	<div class="container" style="margin-top: 80px;">
		<ol class="breadcrumb">
	    	<li><a href="#">Dashboard</a></li>	
		</ol>

		<div class="dashboard-container pb-5">
			<div class="dashboard-icons"><a href="manage-accounts.php">
				<img src="images/icons/account.png" class="img-responsive">
				<h4 class='text-center'><small>Manage Accounts</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="manage-tournaments.php">
				<img src="images/icons/taekwondo.png">
				<h4 class='text-center'><small>Manage Tournaments</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="manage-website.php">
				<img src="images/icons/settings.png" class="img-responsive">
				<h4 class='text-center'><small>Manage Website</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="player-list.php">
				<img src="images/icons/players.png" class="img-responsive">
				<h4 class='text-center'><small>List of Players</small></h4></a>
			</div>
			<div class="dashboard-icons"><a href="manage-reports.php">
				<img src="images/icons/reports.png">
				<h4 class='text-center'><small>Reports</small></h4></a>
			</div>
		</div>
		<footer class="text-center"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>	