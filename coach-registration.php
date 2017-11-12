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
	<style type="text/css">footer { position: relative;  }</style>
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

	<div class="container" style="margin-top: 60px;">
		<div class="row">
			<div class="registration-header"><h1>Registration Form</h1></div>
			<div class="content-container">
				<form class="form-horizontal">
					<div class="col-md-6 col-xs-12">
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="username">Username:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="usernames" required placeholder="Enter Desired Username">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="password">Password:</label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control" id="passwords" required placeholder="Enter Desired Password">
						    </div>
						  </div>			
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="lastname">Last Name:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="lastnames" required placeholder="Enter Family Name">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="firstname">First Name:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="firstname" required placeholder="Enter Given Name">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="middlename">Middle Name:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
						    </div>
						  </div>
						  <div class="form-group">
							  <label class="control-label col-sm-4" for="sex">Sex:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="sex">
								    <option></option>
								    <option>Male</option>
								    <option>Female</option>						  
								  </select>
							  </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="age">Age:</label>
						    <div class="col-sm-8"> 
						      <input type="number" class="form-control" id="age" required placeholder="Enter Age">
						    </div>
						  </div>
						  <div class="form-group">
							  <label class="control-label col-sm-4" for="belt">Belt:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="belt">
								    <option disabled selected data-belt='None'>Choose a belt below</option>
								    <?php
										$con = mysqli_connect("localhost","ttms","ttms","ttms");	
										$result = mysqli_query($con,"SELECT * FROM belts");
											while($row = mysqli_fetch_array($result))
											{
												echo "<option data-belt='" . $row['belt'] . "' >" . $row['belt'] .  "</option>";
											}
											echo "</table>";
											mysqli_close($con);
									?>					  
								  </select>
							  </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="gym">Gym:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="gym" required placeholder="Enter the name of the gym you go to">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="address">Address:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="address" required placeholder="Enter the address of the gym">
						    </div>
						  </div>
					</div>
					<div class="col-md-6 col-xs-12">
						<h4>Create your account</h4>
						<h5><small>Coaches from all around the Philippines who wants their players to participate in the upcoming tournaments should create their very own accounts! Just fill up the registration form and Ta-Da! You, the coach of a gym will have an account! Try it out now!</small></h5>
						<hr>
						<button type="button" class="btn btn-primary pull-right application">Register</button>
					</div>
				</form>
			</div>
		</div>
		<footer class="text-center" style="margin-top: 45px;"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>
		<!-- Modal -->
	<div id="success" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Successful Creation</h4>
	      </div>
	      <div class="modal-body">
	        <p>Successfully created an account!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary modal-closer" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal -->
	<div id="fail" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Unsuccesful Creation</h4>
	      </div>
	      <div class="modal-body">
	        <p>You have missed filling up some fields or you incorrectly filled up a field. Please finish filling up the form</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">

		$(document).on("click", ".application", function() { 
			var usernames = document.getElementById('usernames').value;
			var passwords = document.getElementById('passwords').value;
			var lastnames = document.getElementById('lastnames').value;
			var firstname = document.getElementById('firstname').value;
			var middlename = document.getElementById('middlename').value;
			var sex = document.getElementById('sex').value;
			var age = document.getElementById('age').value;
			var belt = $('select#belt').find(':selected').data('belt');
			var gym = document.getElementById('gym').value;
			var address = document.getElementById('address').value;

			//alert(usernames + " " + passwords + " " +  lastnames + " " +  firstname + " " +  middlename + " " +  sex + " " +  age + " " +  belt + " " +  gym + " " +  address);
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					usernames:usernames,
					passwords:passwords,
					lastnames:lastnames,
					firstname:firstname,
					middlename:middlename,
					sex:sex,
					age:age,
					belt:belt,
					gym:gym,
					address:address,
					action:"register_coach"
				},
			    }).then(function(data) {
			    	alert(data);
			    	if (data == "1"){
						$('#fail').modal({
				        show: 'true'
					    });
			    	}
			    	else {
			    		$('#success').modal({
				        show: 'true'
					    }); 
			    	} 
			    });
		});

		$(document).on("click", ".modal-closer", function() { 
			location.reload();
		});

	</script>
</body>
</html>