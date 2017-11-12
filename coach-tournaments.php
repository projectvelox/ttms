<?php 
	date_default_timezone_set('Asia/Manila');
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

	<!-- Under the Nav Bar | The Dashboard -->
	<div class="container" style="margin-top: 80px;">
		<ol class="breadcrumb">
	    	<li><a href="coach-dashboard.php">Dashboard</a></li>	
	    	<li class="active">Upcoming Tournaments</li>	
		</ol>

		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-8">
				<div class="bordify">
					<h2>Upcoming Tournaments</h2>
					<div class="table-responsive">
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>Tournament Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Venue</th>
							</tr>
							<?php
								$i=0;
								$con = mysqli_connect("localhost","ttms","ttms","ttms");	
								$result = mysqli_query($con,"SELECT * FROM tournament WHERE end_date >= NOW()");
									while($row = mysqli_fetch_array($result))
									{
										$i++;
										echo "<tr>";
										echo "<td>" . $i . ".</td>";
										echo "<td><a href='register_tournament.php?name=".urlencode($row['name'])."' style='color: #23527c; font-weight: bold;' target='_blank'>" . $row['name'] . "</a></td>";
										echo "<td>" . date('F d, Y', strtotime($row['start_date']))  . "</td>";
										echo "<td>" . date('F d, Y', strtotime($row['end_date'])). "</td>";
										echo "<td>" . $row['venue'] . "</td>";
										echo "</tr>";
									}
									mysqli_close($con);
							?>

						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="bordify">
					<h4>Tournaments Entered</h4>
					<h4><small>Check the list of tournaments you are currently participating</small></h4>
					<div class="table-responsive">
						<table class="table tabe-striped">
							<tr>
								<th>#</th>
								<th>Date</th>
							</tr>
							<?php
							$i=0;
							$con = mysqli_connect("localhost","ttms","ttms","ttms");
							$result = mysqli_query($con,"SELECT DISTINCT tournament FROM tournament_registration WHERE coach='$coach'");
								while($row = mysqli_fetch_array($result))
								{	
									$i++;
									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td><a href='register_tournament.php?name=".urlencode($row['tournament'])."' style='color: #23527c; font-weight: bold;' target='_blank'>" . $row['tournament'] . "</a></td>";
									echo "</tr>";	
								}
								mysqli_close($con);
						?>
						</table>
					</div>
				</div>
				<div class="bordify">
					<h4>Previous Tournaments</h4>
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
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> New Tournaments</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="tournament">Tournament:</label>
				    <div class="col-sm-10"> 
				      <input type="text" class="form-control" id="tournament" placeholder="Input tournament name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="start">Start:</label>
				    <div class="col-sm-10"> 
				      <input type="date" class="form-control" id="start">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="end">End:</label>
				    <div class="col-sm-10"> 
				      <input type="date" class="form-control" id="end">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="venue">Venue:</label>
				    <div class="col-sm-10"> 
				      <input type="text" class="form-control" id="venue" placeholder="Input venue name">
				    </div>
				  </div>
				 </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary save" data-dismiss="modal">Save</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- Forms for Creating the Rules -->
		<footer class="text-center"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>

	<!-- Modal -->
	<div id="fail" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Unsuccesful</h4>
	      </div>
	      <div class="modal-body">
	        <p>Please fill up all the fields and don't leave any fields blank!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal -->
	<div id="year" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Unsuccesful</h4>
	      </div>
	      <div class="modal-body">
	        <p>The dates you have entered has already pass. Please enter the current date or enter a date that is beyond the current date.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal -->
	<div id="success" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Successful</h4>
	      </div>
	      <div class="modal-body">
	        <p>You have successfully added a new tournament!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary modal-closer" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).on("click", ".save", function() { 
			var tournament = document.getElementById('tournament').value;
			var start = document.getElementById('start').value;
			var end = document.getElementById('end').value;
			var venue = document.getElementById('venue').value;
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					tournament:tournament,
					start:start,
					end:end,
					venue:venue,
					action:"add_tournament"
				},
			    }).then(function(data) {
			    	if(data == '1'){
			    		$('#myModal').modal('hide');
			    		$('#fail').modal('show');
			    	}
			    	if(data == '2'){
		    			$('#myModal').modal('hide');
		    			$('#year').modal('show');
		    		}
			    	else {
			    		$('#myModal').modal('hide');
			    		$('#success').modal('show');
			    	}
			    });
		});

		$(document).on("click", ".close-modal", function() { 
			$('#myModal').modal('show');
    		$('#fail').modal('hide');
		});

		$(document).on("click", ".modal-closer", function() { 
			$('#success').modal({ show: 'false' }); 
			location.reload();
		});

	</script>
</body>
</html>	