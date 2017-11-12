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
	<style type="text/css">
		@media screen and (max-width: 767px) {
			.table-responsive {
			    width: 100%;
			    margin-bottom: 15px;
			    overflow-y: hidden;
			    -ms-overflow-style: -ms-autohiding-scrollbar;
			    border: 0px;
			}
		}
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    		border-top: 0px;
		}
	</style>
	<?php 
		$x = $_GET['name']; 
	?>
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
	<div class="container" style="margin-top: 60px;">
		<div class="row">
			<div class="registration-header"><h1><?php echo $x?></h1></div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
				<div class="content-container">
					<form class="form-horizontal">
						<div class="form-group">
						    <label class="control-label col-sm-4" for="tournament">Tournament:</label>
						    <div class="col-sm-8">
					    	  <input type="text" class="form-control" id="tournament" disabled value="<?php echo $x?>">
					    	</div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-4" for="coach">Coach:</label>
						    <div class="col-sm-8">
					    	  <input type="text" class="form-control" id="coach" disabled value="<?php echo "$coach"?>">
					    	</div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-4" for="player">Player:</label>
						  <div class="col-sm-8">
							  	<select class="form-control" id="player">
							    	<option disabled selected>Choose a player to register</option>
							    	<?php
										$con = mysqli_connect("localhost","ttms","ttms","ttms");	
										$result = mysqli_query($con,"SELECT * FROM player WHERE coach='$coach' AND id NOT IN (SELECT playerid FROM tournament_registration WHERE tournament = '$x')");
										while($row = mysqli_fetch_array($result))
										{
											$player = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
											echo "<option data-player='" . $player . "' data-id='" . $row['id'] . "' >" . $player .  "</option>";
										}
										mysqli_close($con);
									?>					  
							  	</select>
						  	</div>
					    </div>
					    <div class="form-group">
						    <label class="control-label col-sm-4" for="belt">Belt:</label>
						    <div class="col-sm-8">
					    	  <input type="text" class="form-control" id="belt" disabled value="">
					    	</div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-4" for="skilllevel">Skill Level:</label>
						    <div class="col-sm-8">
					    	  <input type="text" class="form-control" id="skilllevel" disabled value="">
					    	</div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-4" for="category">Category:</label>
						    <div class="col-sm-8">
					    	  <input type="text" class="form-control" id="category" disabled value="">
					    	</div>
						</div>
						<button type="button" class="btn btn-primary pull-right add-to" style="margin-left: 3px;">Add To List</button>
					</form>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div id="table_1">
						<div class="table-responsive">
							<table class="table table-striped">
								<tr style="background-color: white;">
									<th>#</th>
									<th>Player</th>
									<th>Belt</th>
									<th>Skill Level</th>
									<th>Category</th>
								</tr>
								<?php
								$i = 0;
								$con = mysqli_connect("localhost","ttms","ttms","ttms");
								$result = mysqli_query($con,"SELECT * FROM tournament_registration WHERE coach='$coach' AND tournament='$x'");
									while($row = mysqli_fetch_array($result))
									{
										$i++;
										echo "<tr>";
										echo "<td>" . $i . ".</td>";
										echo "<td>" . $row['name'] . "</td>";
										echo "<td>" . $row['belt'] . "</td>";
										echo "<td>" . $row['advanceornovice'] . "</td>";
										echo "<td>" . $row['category'] . "</td>";
										echo "</tr>";
									}
									mysqli_close($con);
								?>
							</table>
						</div>
						<?php
							$con = mysqli_connect("localhost","ttms","ttms","ttms");
							$result = mysqli_query($con,"SELECT FORMAT(SUM(price), 0) AS price FROM tournament_registration WHERE coach='$coach' AND tournament='$x'");
								while($row = mysqli_fetch_array($result))
								{
									echo "<h4 class='text-right fuck'><strong>Total: ₱ <span class='summarized'>" . $row['price'] . "</span></strong></h4>
									<h4 class='text-right'><small>It is a constant price for each and every tournament that each player should be able to pay the registration fee of 500 Pesos.</small></h4>";
								}
								mysqli_close($con);
							?>
					</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$('#player').change(function(){ 
		   var player = $('select#player').find(':selected').data('player');
		   $.ajax({type:"POST",url:"ajax.php",
				data: {
					player:player,
					action: "get_belt",
				},
			    }).then(function(data) {
			    	 $('#belt').val(data);
			    });

			$.ajax({type:"POST",url:"ajax.php",
				data: {
					player:player,
					action: "get_skilllevel",
				},
			    }).then(function(data) {
			    	 $('#skilllevel').val(data);
			    });

			$.ajax({type:"POST",url:"ajax.php",
				data: {
					player:player,
					action: "get_category",
				},
			    }).then(function(data) {
			    	 $('#category').val(data);
			    });
		});
		$(document).on("click", ".add-to", function() { 
			var tournament = document.getElementById('tournament').value;
			var coach = document.getElementById('coach').value;
			var player = $('select#player').find(':selected').data('player');
			var playerid = $('select#player').find(':selected').data('id');
			var belt = document.getElementById('belt').value;		
			var skilllevel = document.getElementById('skilllevel').value;
			var category = document.getElementById('category').value; 		
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					tournament:tournament,
					coach:coach,
					player:player,
					playerid:playerid,
					belt:belt,
					skilllevel:skilllevel,
					category:category,
					action:"add-to-list"
				},
			    }).then(function(data) {
		    		if(data == "1")
		    		{
		    			$('#fail').modal({
			        	show: 'true'
				    	}); 
		    		}
		    		else {
		    			$("#table_1").load(location.href + " #table_1");
		    			location.reload();
		    		}
			    });   
		});
	</script>
</body>
</html>