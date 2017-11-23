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
	    	<li class="active">Manage Tournaments</li>	
		</ol>

		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-8">
				<div class="bordify">
					<h2>Upcoming Tournaments</h2>

					<div class="row">
						<div class="col-md-12 col-xs-12">
							<form method="post">
								<div class="col-md-10 col-xs-12">
									<input type="text" name="search" class="form-control" value="<?= @$_POST['search'] ?>">
								</div>
								<div class="col-md-2 col-xs-12">
									<button class="btn btn-info" name="doSearch" type="submit">SEARCH</button>
								</div>
							</form>
						</div>
					</div>

					<br/>

					<div class="table-responsive">
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>Tournament</th>
								<th>Start</th>
								<th>End</th>
								<th>Venue</th>
								<th>Rules</th>
								<th>Payments</th>
								<th>Match</th>
							</tr>
							<?php
								$i=0;
								$con = mysqli_connect("localhost","ttms","ttms","ttms");
								$query = "SELECT * FROM tournament 
									WHERE end_date >= NOW()";

								if(isset($_POST['doSearch'])){
									$search = addslashes($_POST['search']);
									if($search != '')
										$query .= ' AND name LIKE "%'.$search.'%"';
								}	

								$result = mysqli_query($con,$query);
									while($row = mysqli_fetch_array($result))
									{
										$i++;
										echo "<tr>";
										echo "<td>" . $i . ".</td>";
										echo "<td>" . $row['name'] . "</td>";
										echo "<td>" . date('F d, Y', strtotime($row['start_date']))  . "</td>";
										echo "<td>" . date('F d, Y', strtotime($row['end_date'])). "</td>";
										echo "<td>" . $row['venue'] . "</td>";
										echo "<td><a href='tournamentrule.php?id=".$row['id']."' class='btn btn-xs btn-primary'>Manage</button></td>";
										echo "<td><a href='manage_payments.php?name=".urlencode($row['name'])."' class='btn btn-xs btn-primary'>Manage</button></td>";
										echo "<td><a href='match_tournament.php?id=".$row['id']."' class='btn btn-xs btn-primary' target='_blank'>Match</a></td>";
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
					<h4>Organize a Tournament</h4>
					<h4><small>Adding a new tournament here will affect what the people accessing the site will see.</small></h4>
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Organize a Tournament</button>
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
				  <div class="form-group">
						<label class="control-label col-sm-2" for="image">Image:</label>
						<div class="col-sm-10">
							<input id="file" type="file" name="file" style="margin-top: 7px;"/>
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

	<!-- Modal -->
	<div id="sameName" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Unsuccessful</h4>
	      </div>
	      <div class="modal-body">
	        <p>The tournament you've created or trying to create exists already in the database. Please try again!</p>
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
		<?php 
			$con = mysqli_connect("localhost","ttms","ttms","ttms");
			$query = mysqli_query($con, "SELECT id FROM tournament ORDER BY id DESC LIMIT 1"); 
			$row=mysqli_fetch_assoc($query);
			$newid = $row['id'];
			$newerid = $newid+1;
		?>
		function uploadFile(){
		  var input = document.getElementById("file");
		  file = input.files[0];
		  if(file != undefined){
		    formData= new FormData();
		    if(!!file.type.match(/image.*/)){
		      var item = "<?=$newerid?>";
		      formData.append("image", file, item + '.jpg');
		      $.ajax({
		        url: "uploads.php",
		        type: "POST",
		        data: formData,
		        processData: false,
		        contentType: false
		    	}).then(function(data) {
				    //alert(data);
		      });
		    } else { alert('Not a valid image!'); }
		  	} else { alert('Input something!'); }
		}

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
			    	if(data=="Tournament Exist") { 
			    		$('#myModal').modal('hide'); 
			    		$('#sameName').modal('show');  
			    	}
			    	else {
			    		alert(data);
			    		if(data == '1'){
				    		$('#myModal').modal('hide');
				    		$('#fail').modal('show');
				    	}
				    	if(data == '2'){
			    			$('#myModal').modal('hide');
			    			$('#year').modal('show');
			    		}
				    	else {
				    		uploadFile();
				    		$('#myModal').modal('hide');
				    		$('#success').modal('show');
				    	} 
			    	}
			    	
			    });
		});

		$("#sameName").on('hidden.bs.modal', function () { $('#myModal').modal('show'); });
		$("#year").on('hidden.bs.modal', function () { $('#myModal').modal('show'); });
		$("#fail").on('hidden.bs.modal', function () { $('#myModal').modal('show'); });
	</script>
</body>
</html>	