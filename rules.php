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
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"></span> Login</h4>
	      </div>
	      <div class="modal-body">
	      	<form action="login.php" method="post">
	      		<div class="input-group">
		          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
		          <input type="text" id="username" class="form-control" name="username" placeholder="Username" required />
		        </div>
		        <div class="input-group">
		          <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span> </span>
		          <input type="password" id="password" class="form-control" name="password" placeholder="Password" required />
		        </div>
		      </div>
		      <div class="modal-footer">
		        <input type="submit" id="login_form_submit_btn" name="submit" data-loading-text="Logging in..." class="btn btn-primary" value="Login" onclick="retrieveAccount()"/>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="#">Taekwondo | TMS</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li><a href="rules.php">Rules and Requirements</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="coach-registration.php"><span class="glyphicon glyphicon-user"></span> New Coach</a></li>
	        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav> 
	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-8">
				<h3><span class="glyphicon glyphicon-list-alt"></span> Philippine Taekwondo Association Competition Rules</h3><hr>
				<div class="table-responsive" style="margin-top: -21px;">
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Competition Rule</th>
						</tr>
						<?php
							$i=0;
							$con = mysqli_connect("localhost","ttms","ttms","ttms");	
							$result = mysqli_query($con,"SELECT * FROM rules WHERE status='Current'");
								while($row = mysqli_fetch_array($result))
								{
									$i++;
									echo "<tr>";
									echo "<td>" . $i . ".</td>";
									echo "<td>" . $row['rule'] . "</td>";
									
								}
								mysqli_close($con);
						?>
					</table>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4">
				<img src="images/rules.png" class="img-responsive">
			</div>
		</div><hr>
		<footer class="text-center"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>	