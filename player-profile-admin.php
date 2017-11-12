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
	<?php 
		$id = $_GET['id'];
		$con = mysqli_connect("localhost","ttms","ttms","ttms");	
		$result = mysqli_query($con,"SELECT * FROM player WHERE id='$id'");
			while($row = mysqli_fetch_array($result))
			{
				$name = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
				$age = $row['age'];
				$sex = $row['sex'];
				$dob = $row['dateofbirth'];
				$weight = $row['weight'];
				$height = $row['height'];
				$firsttimer = $row['firsttimer'];
				$novice = $row['noviceoradvance'];
				$skillrating = $row['skillrating'];
				$stamina = $row['stamina'];
				$speed = $row['speed'];
				$power = $row['power'];
				$achievement = $row['achievement'];
				$belt = $row['belt'];
				$degree = $row['school_degree'];
				$category = $row['category'];		
			}
	?>

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


	<div class="container" style="margin-top: 80px;">
		<ol class="breadcrumb" style="margin-bottom: 0px;">
	    	<li><a href="admin-dashboard.php">Dashboard</a></li>	
	    	<li class="active"><?php echo $name ?></li>
		</ol>
		<div class="row">
			<div class="registration-header">
				<h1>
				<?php
					$con = mysqli_connect("localhost","ttms","ttms","ttms");	
					$result = mysqli_query($con,"SELECT * FROM player WHERE id='$id'");
						while($row = mysqli_fetch_array($result))
						{
							$name = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
							echo $name ;
						}
						mysqli_close($con);
					?>
				</h1>
			</div>
			<div class="content-container">
					<form class="form-horizontal">
					<div class="col-md-6 col-xs-12">
					<img src='images/players/<?=$name?>.jpg' onerror="src='images/players/none.jpg'" style='height: 100%;'></br></br>
					<h4>Basic Information:</h4>
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="age">Age:</label>
						    <div class="col-sm-10"> 
						      <input type="text" class="form-control" id="age" disabled value="<?php echo "$age" ?>">
						    </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-2" for="sex">Sex:</label>
							  <div class="col-sm-10"> 
						      	<input type="text" class="form-control" disabled value="<?php echo "$sex" ?>">
						   	  </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="dateofbirth">Birthdate:</label>
						    <div class="col-sm-10"> 
						      <input type="date" class="form-control" id="dateofbirth" disabled value="<?php echo "$dob"?>">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="coach">Coach:</label>
						    <div class="col-sm-10"> 
						      <input type="text" class="form-control" id="coach" disabled value="<?php echo "$coach"?>">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="gym">Gym:</label>
						    <div class="col-sm-10"> 
						      <input type="text" class="form-control" id="gym" disabled value="<?php echo "$gym"?>">
						    </div>
						  </div>

						   <div class="form-group">
						    <label class="control-label col-sm-2" for="weight">Weight:</label>
						    <div class="col-sm-10"> 
						      <input type="number" class="form-control" id="weight" disabled value="<?php echo "$weight"?>">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="height">Height:</label>
						    <div class="col-sm-10"> 
						      <input type="number" class="form-control" id="height" disabled value="<?php echo "$height"?>">
						    </div>
						  </div>

					</div>
					</form>
					<div class="col-md-6 col-xs-12">
						<form class="form-horizontal">
						<h4 class="text-right">Taekwondo Information:</h4>
						  <div class="form-group">
						    <label class="control-label col-sm-4" for="firsttimer">First Timer:</label>
						    <div class="col-sm-8"> 
						      <input type="text" class="form-control" id="firsttimer" disabled value="<?php echo "$firsttimer"?>">
						    </div>
						  </div>
						  
						  <div class="form-group more notless" >
							  <label class="control-label col-sm-4" for="joinedmorethan"> Joined more than 5 tournaments:</label>
							  <div class="col-sm-8"> 
						     	 <input type="text" class="form-control" id="joinedmorethan" disabled value="<?php echo "$joinedmorethan"?>">
						      </div>
						  </div>

						  <div class="form-group more less">
							  <label class="control-label col-sm-4" for="joinedlessthan">Joined less than 5 tournaments:</label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="joinedlessthan" disabled value="<?php echo "$joinedlessthan"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="noviceoradvance"> Novice or Advance: </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="noviceoradvance" disabled value="<?php echo "$novice"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="skillrating"> Skill Rating (1-10): </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="skillrating" disabled value="<?php echo "$skillrating"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="stamina"> Stamina (1-10): </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="stamina" disabled value="<?php echo "$stamina"?>">
						      </div>
						  </div>

						 <div class="form-group">
							  <label class="control-label col-sm-4" for="speed"> Speed (1-10): </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="speed" disabled value="<?php echo "$speed"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="power"> Power (1-10): </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="power" disabled value="<?php echo "$power"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="achievement"> Highest Achievement: </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="achievement" disabled value="<?php echo "$achievement"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="belt">Belt:</label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="belt" disabled value="<?php echo "$belt"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="degree"> School Degree: </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="degree" disabled value="<?php echo "$degree"?>">
						      </div>
						  </div>

						  <div class="form-group">
							  <label class="control-label col-sm-4" for="category"> Category: </label>
							  <div class="col-sm-8"> 
						      	<input type="text" class="form-control" id="category" disabled value="<?php echo "$category"?>">
						      </div>
						  </div>
						</form>
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
		    			alert(data);
		    			$("#table_1").load(location.href + " #table_1");

		    		}
			    });
		});
	</script>
</body>
</html>