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
					<h2>Tournament Rules</h2>
					<div class="table-responsive">
						<table class="table tabe-striped">
							<tr>
								<th>#</th>
								<th>Rules</th>
								<th>Action</th>
							</tr>
							<?php
							$i=0;
							$id= $_REQUEST['id'];
							$con = mysqli_connect("localhost","ttms","ttms","ttms");
							$result = mysqli_query($con,"SELECT * FROM rules WHERE tournament_id='$id' AND status!='Old'");
								while($row = mysqli_fetch_array($result))
								{	
									$i++;
									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>".$row['rule']."</td>";
									echo "<td>";
									echo "<button class='btn btn-xs btn-danger removeRule' data-id='".$row['id']."'><span class='glyphicon glyphicon-remove'><span></button>";
									echo "<button class='btn btn-xs btn-primary editRule' id='editRule-".$row['id']."' data-id='".$row['id']."' data-rule='".$row['rule']."' style='margin-left: 5px;'><span class='glyphicon glyphicon-pencil'><span></button>";
									echo "<td>";
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
					<h4>Add New Rules</h4>
					<h4><small>Adding a new tournament rule here will affect what the people accessing the site will see.</small></h4>
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create</button>
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
				    <label class="control-label col-sm-2" for="rule">Rule:</label>
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
		$(document).on("click", ".editRule", function() {
			var id = $(this).data('id');
			var rule = $(this).data('rule');
			var converted = '<div class="input-group add-on" id="edit-rule-'+id+'" ><input class="form-control" placeholder="'+rule+'" type="text"><div class="input-group-btn"><button class="btn btn-success saveRule" data-buttonid="'+id+'" id="save-rule-'+id+'"><i class="glyphicon glyphicon-ok"></i></button></div><div class="input-group-btn"><button class="btn btn-danger cancelRule" data-cancelid="'+id+'" data-cancelrule="'+rule+'" id="cancel-rule-'+id+'"><i class="glyphicon glyphicon-remove"></i></button></div></div>';

			$('.removeRule').hide();
			$('#editRule-'+id).replaceWith('<td id="save-rule-'+id+'">'+converted+'</td>');
		});

		$(document).on("click", ".cancelRule", function() {
			var id = $(this).data('cancelid');
			var rule = $(this).data('cancelrule'); 
			$('.removeRule').show();
			$('#edit-rule-'+id).replaceWith('<td class="changeOnclick" id="changeOnclick-'+id+'" data-id="'+id+'"  data-rule="'+rule+'"><button class="btn btn-xs btn-primary editRule" id="editRule-'+id+'" data-id="'+id+'" data-rule="'+rule+'" style="margin-left: 5px;"><span class="glyphicon glyphicon-pencil"><span></button></td>');
		});

		$(document).on("click", ".save", function() { 
			var rule = document.getElementById('rule').value;
			var id = "<?=$id?>";

			$.ajax({type:"POST",url:"ajax.php",
				data: {
					id:id,
					rule:rule,
					action:"tournament-rules"
				},
			    }).then(function(data) {
					$('#myModal').modal('hide');
					location.reload();
			    });
		});

		$(document).on("click", ".removeRule", function() { 
			var id = $(this).data('id');
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					id:id,
					action:"fuckingremoveme"
				},
			    }).then(function(data) {
			    	location.reload();
			    });
		});


	</script>
</body>
</html>	