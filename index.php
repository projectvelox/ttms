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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-log-in"></span> Login Creditentials</h4>
	      </div>
	      <div class="modal-body">
	      	<form action="login.php" method="post">
	      		<div class="input-group">
		          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
		          <input type="text" id="username" class="form-control" name="username" placeholder="Username" required />
		        </div><br>
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
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
 	  	<ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	    </ol>
	      <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	        <div class="item active">
	          <img src="images/slider/2.jpg">
	        </div><!-- End Item -->
	 
	        <div class="item">
	          <img src="images/slider/1.jpg">
	        </div><!-- End Item -->
	                
	    </div><!-- End Carousel Inner -->
	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	</div>
	<div class="home-banner">
		<h1 class="text-uppercase"><strong>Register Your Players!</strong></h1>
		<h3 style="margin: -10px 0px 20px 0px;"><small>Wanna register your players for the upcoming Taekwondo Tournaments? Okay then Coach! Press the register button below to get started!</small></h3>
		<button class="btn btn-primary" data-toggle="modal" data-target="#oops">Register Your Players Now!</button>
	</div>
	<div class="container" style="margin-top: 20px;">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<h2>Upcoming Events / Tournaments</h2><hr>
				<?php
					$i=0;
					$con = mysqli_connect("localhost","ttms","ttms","ttms");	
					$result = mysqli_query($con,"SELECT * FROM tournament WHERE end_date >= NOW()");
					while($row = mysqli_fetch_array($result))
					{
						$i++;
						echo '<div class="custom-border">';
						echo '<h4><span class="glyphicon glyphicon-star"></span></h4>';
						echo '<h4>'.$row['name'].'</h4>';
						echo '<h5 style="margin-top: -5px;"><small>'.date('F d, Y', strtotime($row['start_date'])).' - '.date('F d, Y', strtotime($row['end_date'])).'</small></h5>';
						echo '<h5><small>Venue: '.$row['venue'].'</small></h5>';
						echo '<a href="tournamentprofile.php?id='.$row['id'].'" class="btn btn-primary btn-xs">View More</a>';
						echo '</div>';
					}
					mysqli_close($con);
				?>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="bordify">
					<h4>Tournament History</h4>
					<h4><small>Check the list of previous tournaments here</small></h4>
					<div class="table-responsive">
						<table class="table tabe-striped">
							<tr>
								<th>#</th>
								<th>Date</th>
							</tr>
							<?php
							$i=0;
							$con = mysqli_connect("localhost","ttms","ttms","ttms");
							$result = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(start_date, '%M %Y' ) AS start_date_1 FROM tournament WHERE start_date<=NOW() AND end_date <= NOW()");
								while($row = mysqli_fetch_array($result))
								{	
									$i++;
									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td><a href='previous_tournaments.php?date=".urlencode($row['start_date_1'])."' style='color: #23527c; font-weight: bold;' target='_blank'>" . $row['start_date_1'] . "</a></td>";
									echo "</tr>";	
								}
								mysqli_close($con);
						?>
						</table>
					</div>
				</div>
			</div>
		</div><hr>
		<footer class="text-center"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>
	<!-- Modal -->
	<div id="oops" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Coach Login Required</h4>
	      </div>
	      <div class="modal-body">
	        <p>In order for you to access this page's feauture, you must be logged in to an account. If you don't have an account please register first. If you have one already please login</p>
	      </div>
	      <div class="modal-footer">
		    <button type="button" class="btn btn-primary register">Register</button>
	        <button type="button" class="btn btn-primary login">Login</button>
	      </div>
	    </div>

	  </div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).on("click", ".login", function() { 
			$('#oops').modal('hide');
			$('#myModal').modal('show');  
		});

		$(document).on("click", ".register", function() { 
			$('#oops').modal('hide');
			window.location.assign('registration.php'); 
		});
	</script>
</body>
</html>	