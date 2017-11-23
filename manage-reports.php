<?php 
	include('session.php');
	include('config.php');
	if(!isset($_SESSION['login_user'])){ header("location:index.php"); }
	$con = mysqli_connect("localhost","ttms","ttms","ttms");
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
</head>
<body>
	<style type="text/css"> footer { position: relative; bottom: 0%; color: #545454;} .bordify:hover { border-color: #3d838a; } .bordify { border: 1px solid #ddd; } </style>
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
		            <li><a href="coach-dashboard.php">Dashboard</a></li>
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


	<div class="container" style="margin-top: 80px;">
		<ol class="breadcrumb" style="margin-bottom: 0px;">
	    	<li><a href="admin-dashboard.php">Dashboard</a></li>	
	    	<li class="active">Reports</li>
		</ol>
		<div class="row">
			<div class="registration-header"><h1>List of Tournaments</h1></div>
			<div class="content-container">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#home">Year</a></li>
				  <li><a data-toggle="tab" href="#menu1">Month</a></li>
				  <li><a data-toggle="tab" href="#menu3">Tournaments</a></li>
				  <li><a data-toggle="tab" href="#menu2">Others</a></li>
				</ul>

				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active">
				   	<h3 class="text-center">List of Tournaments</h3><br>
				   	<?php
						$result = mysqli_query($con,"SELECT YEAR(end_date) AS variable FROM tournament GROUP BY YEAR(end_date) ORDER BY YEAR(end_date) ASC");
						while($row = mysqli_fetch_array($result))
						{
							echo '
							<div class="col-md-3 col-xs-12">
								<a href="reports-year.php?year='.$row['variable'].'" style="text-decoration:none; color: #000;" target="_blank">
								<div class="bordify">
									<h5 class="text-center"><span class="glyphicon glyphicon-list-alt"></span></h5>
									<h4 class="text-center">'.$row['variable'].'</h4>
								</div>
								</a>
							</div>
							';
						}
					?>
				    
				  </div>
				  <div id="menu1" class="tab-pane fade">
				  	<h3 class="text-center">List of Tournaments</h3><br>
				   	<?php
						$result = mysqli_query($con,"SELECT CONCAT(MONTHNAME(end_date), ' ', YEAR(end_date)) AS variable FROM tournament GROUP BY CONCAT(MONTHNAME(end_date), ' ', YEAR(end_date)) ORDER BY YEAR(end_date), MONTHNAME(end_date) DESC");
						while($row = mysqli_fetch_array($result))
						{
							echo '
							<div class="col-md-3 col-xs-12">
								<a href="reports-month.php?month='.$row['variable'].'" style="text-decoration:none; color: #000;" target="_blank">
								<div class="bordify">
									<h5 class="text-center"><span class="glyphicon glyphicon-list-alt"></span></h5>
									<h4 class="text-center">'.$row['variable'].'</h4>
								</div>
								</a>
							</div>
							';
						}
					?>
				  </div>
				  <div id="menu3" class="tab-pane fade">
				  	<h3 class="text-center">List of Tournaments</h3><br>
				  	<div class="table-responsive">
				  		<table class="table table-striped"> 
				  			<tr>
				  				<th>#</th>
				  				<th>Name</th>
				  				<th>Venue</th>
				  				<th>Date</th>
				  				<th>Action</th>
				  			</tr>	
						   	<?php
								$result = mysqli_query($con,"SELECT * FROM tournament ORDER BY end_date DESC");
								$i=0;
								while($row = mysqli_fetch_array($result))
								{
									$i++;
									echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row['name'].'</td>';
									echo '<td>'.$row['venue'].'</td>';
									echo '<td>'.date('F d, Y', strtotime($row['start_date'])).' - '.date('F d, Y', strtotime($row['end_date'])).'</td>';
									echo '<td><a class="btn btn-xs btn-primary" href="report-players.php?name='.$row['name'].'"><span class="glyphicon glyphicon-share-alt"></span></a></td>';
									echo '</tr>';
								}
							?>
						</table>
					</div>
				  </div>
				  <div id="menu2" class="tab-pane fade">
				  	<h3 class="text-center">Printable Lists</h3><br>
				  	<div class="row">
					  	<div class="col-md-3 col-xs-12">
					  		<a href="reports-coaches.php" style="text-decoration: none; color: #000;" target="_blank">
							<div class="bordify">
								<h5 class="text-center"><span class="glyphicon glyphicon-list-alt"></span></h5>
								<h4 class="text-center">Coaches</h4>
							</div></a>
						</div>
						<div class="col-md-3 col-xs-12">
							<a href="reports-gyms.php" style="text-decoration: none; color: #000;" target="_blank">
							<div class="bordify">
								<h5 class="text-center"><span class="glyphicon glyphicon-list-alt"></span></h5>
								<h4 class="text-center">Gyms</h4>
							</div></a>
						</div>
						<div class="col-md-3 col-xs-12">
							<a href="reports-rules.php" style="text-decoration: none; color: #000;" target="_blank">
							<div class="bordify">
								<h5 class="text-center"><span class="glyphicon glyphicon-list-alt"></span></h5>
								<h4 class="text-center">Rules</h4>
							</div></a>
						</div>
					</div>
				  </div>
				</div>
			</div>
		</div>
		<footer class="text-center" style="margin-top: 45px;"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>