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
	    	<li><a href="admin-dashboard.php">Dashboard</a></li>	
	    	<li class="active">List of Players</li>	
		</ol>

		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-8">
				<div class="bordify">
					<h2>List of Players</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Age</th>
								<th>Sex</th>
								<th>Coach</th>
								<th>Gym</th>
							</tr>
							<?php
								$i=0;
								$con = mysqli_connect("localhost","ttms","ttms","ttms");	
								$result = mysqli_query($con,"SELECT CONCAT(firstname, ' ', middlename, ' ',lastname) AS name, player.* FROM player");
									while($row = mysqli_fetch_array($result))
									{
										$i++;
										echo "<tr>";
										echo "<td>" . $i . ".</td>";
										echo "<td><a href='player-profile-admin.php?id=".$row['id']."' target='_blank'>" . $row['name'] . "</a></td>";
										echo "<td>" . $row['age'] . " Years Old</td>";
										echo "<td>" . $row['sex'] . "</td>";
										echo "<td>" . $row['coach'] . "</td>";
										echo "<td>" . $row['gym'] . "</td>";
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
					<h2>Coaches</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>#</th>
								<th>Coach</th>
								<th>Number of Players</th>
							</tr>
							<?php
								$i=0;
								$con = mysqli_connect("localhost","ttms","ttms","ttms");	
								$result = mysqli_query($con,"SELECT COUNT(*) AS players, player.* FROM player GROUP BY coach ");
									while($row = mysqli_fetch_array($result))
									{
										$i++;
										echo "<tr>";
										echo "<td>" . $i . ".</td>";
										echo "<td><a href='coachplayers.php?coach=".$row['coach']."'>" . $row['coach'] . "</a></td>";
										echo "<td>" . $row['players'] . " Players</td>";
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
		        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> New Rule</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="pwd">Rule:</label>
				    <div class="col-sm-10"> 
				      <textarea class="form-control" rows="5" id="rule"></textarea>
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
		<!---->

		<footer class="text-center" style="position: relative;"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
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
	<div id="success" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Successful</h4>
	      </div>
	      <div class="modal-body">
	        <p>You have successfully added a rule to the to list of Philippine Taekwondo Association Competition Rules & Interpretation</p>
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
			var rule = document.getElementById('rule').value;
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					rule:rule,
					action:"add_rule"
				},
			    }).then(function(data) {
			    	if(data == '1'){
			    		$('#myModal').modal('hide');
			    		$('#fail').modal('show');
			    	}
			    	else {
			    		$('#myModal').modal('hide');
			    		$('#success').modal('show');
			    	}
			    });
		});

		$(document).on("click", ".remove", function() { 
			var id = $(this).data('id');
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					id:id,
					action:"remove_rule"
				},
			    }).then(function(data) { 
			    	location.reload();
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