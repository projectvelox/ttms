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
</head>
<body>
	<style type="text/css"> footer { position: relative; bottom: 0%; color: #545454;}</style>
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
	    	<li><a href="coach-dashboard.php">Dashboard</a></li>	
	    	<li class="active">Players</li>
		</ol>
		<div class="row">
			<div class="registration-header"><h1>Create Player Profile</h1></div>
			<div class="content-container">
					<form class="form-horizontal">
					<div class="col-md-6 col-xs-12">


						  <div class="form-group">
						    <label class="control-label col-sm-4" for="lastname">Last Name:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="lastname" placeholder="Enter Family Name">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="firstname">First Name:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="firstname" placeholder="Enter Given Name">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="middlename">Middle Name:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="age">Age:</label>
						    <div class="col-sm-8"> 
						      <input type="number" class="form-control" id="age" placeholder="Enter Age">
						    </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="sex">Sex:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="sex">
								    <option selected disabled>Select an option below</option>
								    <option>Male</option>
								    <option>Female</option>						  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="dateofbirth">Date Of Birth:</label>
						    <div class="col-sm-8"> 
						      <input type="date" class="form-control" id="dateofbirth" placeholder="Enter Date Of Birth">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="coach">Coach:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="coach" disabled value="<?php echo "$coach"?>">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="gym">Gym:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="gym" disabled value="<?php echo "$gym"?>">
						    </div>
						  </div>

						   <div class="form-group">
						    <label class="control-label col-sm-4" for="weight">Weight:</label>
						    <div class="col-sm-8"> 
						      <input type="number" class="form-control" id="weight" placeholder="Enter Weight - Weight is in Kg">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-4" for="height">Height:</label>
						    <div class="col-sm-8"> 
						      <input type="number" class="form-control" id="height" placeholder="Enter height - Height is in cm">
						    </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="firsttimer">First Timer:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="firsttimer">
								    <option selected disabled>Select an option below</option>
								    <option>Yes</option>
								    <option>No</option>						  
								  </select>
							  </div>
						  </div>

						  <div class="form-group more notless" >
							  <label class="control-label col-sm-4" for="joinedmorethan"> Joined more than 5 tournaments:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="joinedmorethan">
								    <option selected disabled>Select an option below</option>
								    <option>Yes</option>
								    <option>No</option>						  
								  </select>
							  </div>
						  </div>

						  <div class="form-group more less">
							  <label class="control-label col-sm-4" for="joinedlessthan">Joined less than 5 tournaments:</label>
							  <div class="col-sm-8">
								  <select class="form-control" id="joinedlessthan">
								    <option selected disabled>Select an option below</option>
								    <option>Yes</option>
								    <option>No</option>						  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="noviceoradvance"> Novice or Advance: </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="noviceoradvance">
								    <option selected disabled>Select an option below</option>
								    <option>Novice</option>
								    <option>Advance</option>						  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="skillrating"> Skill Rating (1-10): </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="skillrating">
								    <option selected disabled>Select an option below (1 highest & 10 lowest)</option>
								    <option>1</option>
								    <option>2</option>	
								    <option>3</option>
								    <option>4</option>
								    <option>5</option>
								    <option>6</option>
								    <option>7</option>
								    <option>8</option>		
								    <option>9</option>
								    <option>10</option>			  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="stamina"> Stamina (1-10): </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="stamina">
								    <option selected disabled>Select an option below (1 highest & 10 lowest)</option>
								    <option>1</option>
								    <option>2</option>	
								    <option>3</option>
								    <option>4</option>
								    <option>5</option>
								    <option>6</option>
								    <option>7</option>
								    <option>8</option>		
								    <option>9</option>
								    <option>10</option>			  
								  </select>
							  </div>
						  </div>

						 <div class="form-group">
							  <label class="control-label col-sm-4" for="speed"> Speed (1-10): </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="speed">
								    <option selected disabled>Select an option below (1 highest & 10 lowest)</option>
								    <option>1</option>
								    <option>2</option>	
								    <option>3</option>
								    <option>4</option>
								    <option>5</option>
								    <option>6</option>
								    <option>7</option>
								    <option>8</option>		
								    <option>9</option>
								    <option>10</option>			  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="power"> Power (1-10): </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="power">
								    <option selected disabled>Select an option below (1 highest & 10 lowest)</option>
								    <option>1</option>
								    <option>2</option>	
								    <option>3</option>
								    <option>4</option>
								    <option>5</option>
								    <option>6</option>
								    <option>7</option>
								    <option>8</option>		
								    <option>9</option>
								    <option>10</option>			  
								  </select>
							  </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="achievement"> Highest Achievement: </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="achievement">
								    <option selected disabled>Select an option below</option>
								    <option>None</option>
								    <option>Local</option>
								    <option>Regional</option>
								    <option>National</option>
								    <option>International</option>							  
								  </select>
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
							  <label class="control-label col-sm-4" for="degree"> School Degree: </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="degree">
								    <option selected disabled>Select an option below</option>
								    <option>Elementary</option>
								    <option>Highschool</option>
								    <option>College</option>		  
								  </select>
							  </div>
						  </div>

						  <div class="form-group elementary">
							  <label class="control-label col-sm-4" for="elementary"> Category: </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="elementary">
								    <option selected disabled>Select an option below</option>
								    <option>Group 1</option>
								    <option>Group 2</option>
								    <option>Group 3</option>
								    <option>Group 4</option>
								    <option>Group 5</option>
								    <option>Group 6</option>		  
								  </select>
							  </div>
						  </div>

						  <div class="form-group highschool">
							  <label class="control-label col-sm-4" for="highschool"> Category: </label>
							  <div class="col-sm-8">
								  <select class="form-control" id="highschool">
								    <option selected disabled>Select an option below</option>
								    <option>Fin Weight</option>
									<option>Fly Weight</option>
									<option>Bantam Weight</option>
									<option>Feather Weight</option>
									<option>Light Weight</option>
									<option>Welter Weight</option>
									<option>Light Middle Weight</option>
									<option>Middle Weight</option>
									<option>Light Heavy Weight</option>
									<option>Heavy Weight</option>	
								  </select>
							  </div>
						  </div>

							<div class="form-group college">
								  <label class="control-label col-sm-4" for="college"> Category: </label>
								  <div class="col-sm-8">
									  <select class="form-control" id="college">
									    <option selected disabled>Select an option below</option>
										<option>Fin Weight</option>
										<option>Fly Weight</option>
										<option>Bantam Weight</option>
										<option>Feather Weight</option>
										<option>Light Weight</option>
										<option>Welter Weight</option>
										<option>Middle Weight</option>
										<option>Heavy Weight</option>					  
									  </select>
								  </div>
							</div>

						  	<div class="form-group">
								<label class="control-label col-sm-4" for="image">Image:</label>
								<div class="col-sm-8">
									<input id="file" type="file" name="file" style="margin-top: 7px;"/>
								</div>
							</div>
						  <button type="button" class="btn btn-primary add pull-right">Add Player to Team</button>
					</div>
					</form>
					<div class="col-md-6 col-xs-12">
						<h4> My Team</h4>
						<h5><small>Click on their names to view their profiles</small></h5>
						<div class="table-responsive">
							<table class="table table-striped" id="table_1">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Category</th>
									<th>Belt</th>
								</tr>
								<?php
										$i=0;

										$con = mysqli_connect("localhost","ttms","ttms","ttms");	
										$result = mysqli_query($con,"SELECT * FROM player WHERE coach='$coach'");
											while($row = mysqli_fetch_array($result))
											{
												$i++;
												$name = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
												echo "<tr>";
												echo "<td>" . $i . "</td>";
												echo "<td><a href='player-profile.php?id=".urlencode($row['id'])."' target='_blank'>" . $name . "</a></td>";
												echo "<td>" . $row['category'] . "</td>";
												echo "<td>" . $row['belt'] . "</td>";
												echo "</tr>";
											}
											echo "</table>";
											mysqli_close($con);
									?>
							</table>
						</div>
					</div>
				
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
		function uploadFile(){
		  var input = document.getElementById("file");
		  file = input.files[0];
		  if(file != undefined){
		    formData= new FormData();
		    if(!!file.type.match(/image.*/)){
		      var lastname = document.getElementById('lastname').value;
			  var firstname = document.getElementById('firstname').value;
			  var middlename = document.getElementById('middlename').value;
			  var item = firstname + " " + middlename + " " + lastname;
		      formData.append("image", file, item + '.jpg');
		      $.ajax({
		        url: "upload-players.php",
		        type: "POST",
		        data: formData,
		        processData: false,
		        contentType: false
		    	}).then(function(data) {
				    alert(data);
		      });
		    } else { alert('Not a valid image!'); }
		  	} else { alert('Input something!'); }
		}

		$(document).ready(function(){
			$(".more").hide(); 
			$(".less").hide();
			$(".elementary").hide();
			$(".highschool").hide();
			$(".college").hide();

			$('#firsttimer').change(function(){ 
				var firsttimer = document.getElementById('firsttimer').value;
				if (firsttimer == 'No'){
					$(".less").show(); 
					$(".more").show(); 
					$('#noviceoradvance').prop('disabled', false);
				}
				if (firsttimer == 'Yes') {
					$(".more").hide(); 
					$(".less").hide();
					document.getElementById('noviceoradvance').value = 'Novice';
					$('#noviceoradvance').prop('disabled', true);
				}
			});

			$('#joinedmorethan').change(function(){ 
				var joinedmorethan = document.getElementById('joinedmorethan').value;
				if (joinedmorethan == 'Yes'){
					$(".less").hide(); 
				}
				if (joinedmorethan == 'No') {
					$(".notless").hide(); 
					$(".less").show();
				} 
			});

			$('#joinedlessthan').change(function(){ 
				var joinedlessthan = document.getElementById('joinedlessthan').value;
				if (joinedlessthan == 'Yes'){
					$(".notless").hide(); 
				}
				if (joinedlessthan == 'No') {
					$(".less").hide(); 
					$(".notless").show();
				}
			});

			$('#degree').change(function(){ 
				var degree = document.getElementById('degree').value;

				if (degree == 'Elementary'){
					$(".elementary").show();
					$(".highschool").hide();
					$(".college").hide(); 
				}

				if (degree == 'Highschool') {
					$(".highschool").show();
					$(".elementary").hide();
					$(".college").hide(); 
				}

				if (degree == 'College') {
					$(".college").show();
					$(".highschool").hide();
					$(".elementary").hide(); 
				}
			});

		});

		$(document).on("click", ".add", function() { 
			var lastname = document.getElementById('lastname').value;
			var firstname = document.getElementById('firstname').value;
			var middlename = document.getElementById('middlename').value;
			var age = document.getElementById('age').value;
			var sex = document.getElementById('sex').value;
			var dateofbirth = document.getElementById('dateofbirth').value;
			var coach = document.getElementById('coach').value;
			var gym = document.getElementById('gym').value;
			var weight = document.getElementById('weight').value;
			var height = document.getElementById('height').value;
			var firsttimer = document.getElementById('firsttimer').value;
			var joinedmorethan = document.getElementById('joinedmorethan').value;
			var joinedlessthan = document.getElementById('joinedlessthan').value;
			var noviceoradvance = document.getElementById('noviceoradvance').value;
			var skillrating = document.getElementById('skillrating').value;
			var stamina = document.getElementById('stamina').value;
			var speed = document.getElementById('speed').value;
			var power = document.getElementById('power').value;
			var achievement = document.getElementById('achievement').value;
			var belt = $('select#belt').find(':selected').data('belt');
			var degree = document.getElementById('degree').value;

			if(firsttimer == 'Yes') {
				var joinedmorethan = 'Not Applicable';
				var joinedlessthan = 'Not Applicable';
				var noviceoradvance = 'Novice';
			}

			if(degree == 'Select an option below') {
				var category = '';
			}

			if(joinedmorethan == 'Yes') {
				var joinedlessthan = 'No';
			}

			if(joinedlessthan == 'Yes') {
				var joinedmorethan = 'No';
			}

			if(degree == 'Elementary') {
				var category = document.getElementById('elementary').value;
			}

			if(degree == 'Highschool') {
				var category = document.getElementById('highschool').value;
			}

			if(degree == 'College') {
				var category = document.getElementById('college').value;
			}
			$.ajax({type:"POST",url:"ajax.php",
				data: {
					lastname:lastname,
					firstname:firstname,
					middlename:middlename,
					age:age,
					sex:sex,
					dateofbirth:dateofbirth,
					coach:coach,
					gym:gym,
					weight:weight,
					height:height,
					firsttimer:firsttimer,
					joinedmorethan:joinedmorethan,
					joinedlessthan:joinedlessthan,
					noviceoradvance:noviceoradvance,
					skillrating:skillrating,
					stamina:stamina,
					speed:speed,
					power:power,
					achievement:achievement,
					belt:belt,
					degree:degree,
					category:category,
					action: "add_to_team",
				},
			    }).then(function(data) {
			    	if(data == "1")
		    		{
		    			$('#fail').modal({
			        	show: 'true'
				    	}); 
		    		}
		    		else {
		    			uploadFile();
		    			$("#table_1").load(location.href + " #table_1");
		    			location.reload();
		    		}
			    });
		});
	</script>
</body>
</html>