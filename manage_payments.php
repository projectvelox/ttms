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
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">			
				<div class="content-container">
					<div class="table-responsive">
						<table class="table table-striped">
							<tr style="background-color: white;">
								<th>#</th>
								<th>Coach</th>
								<th>Number of Players</th>
								<th>Total Payment</th>
								<th>Status</th>
							</tr>						
							<?php
								$i=0;
						  	    $con = mysqli_connect("localhost","ttms","ttms","ttms");
						  	    $sql1 = "SELECT DISTINCT coach FROM tournament_registration WHERE tournament='$x'";
						  	    $result = $con->query($sql1);
						  		
						  		foreach ($result as $coach)
		    					{
		    						$i++;
		    						$coach = $coach['coach'];
		    						echo "<tr>";
		    						echo "<td>" . $i . "</td>";
		    						echo "<td>" . $coach . "</td>";

		    						$sql2 = "SELECT COUNT(name) AS names FROM tournament_registration WHERE coach = '$coach' AND tournament='$x'";
		    						
		    						$result1 = $con->query($sql2);
							        foreach ($result1 as $names)
							        {
							           	$players = $names["names"];
							            echo "<td>" . $players . "</td>";
							        }

							        $sql3 = "SELECT SUM(price) AS price FROM tournament_registration WHERE coach = '$coach' AND tournament='$x'";
		    						
		    						$result2 = $con->query($sql3);
							        foreach ($result2 as $price)
							        {
							           	$price = $price["price"];
							            echo "<td>‎₱ " . $price . "</td>";
							        }
							        

							        $sql4 = "SELECT DISTINCT status FROM tournament_registration WHERE tournament='$x' AND coach='$coach'";
		    						
		    						$result3 = $con->query($sql4);
							        foreach ($result3 as $status)
							        {
							           	$status = $status["status"];
							           	if($status == 'Unpaid')
							           	{
							           		echo "<td><button class='btn btn-primary btn-sm unpaid' data-coach='".$coach."'  data-tournament='".$x."'>Unpaid</button></td>";
							           	}
							            else { echo "<td>" . $status . "</td>"; }
							        }

							        echo "</tr>";
		    					}
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h3>Payment Tab</h3>
				<h4><small>Here in this tab all you really need to do is to click underneath the coach's status whether or not they have already paid during the event or not.</small></h4>
			</div>
		</div>
		<footer class="text-center" style="margin-top: 45px;"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
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
		    		}
			    });   
		});

		$(document).on("click", ".unpaid", function() { 
			var coach = $(this).data('coach');
			var tournament = $(this).data('tournament');
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					coach:coach,
					tournament:tournament,
					action:"pay_up"
				},
			    }).then(function(data) {
			    	location.reload();
			    });   
		});
	</script>
</body>
</html>