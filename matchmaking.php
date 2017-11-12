<html>
  <head>
 <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Taekwondo Tournament Matching System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/matchmaking.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="images/favicon.ico">

</head>
  </head>
  <body class="hold-transition register-page">
  	<div class="register-box">
      <!-- <div class="register-logo">
        <a href="ambassador_home.php"><b>anttts</b>| Ambassadors</a>
      </div> -->

      <div class="register-box-body">
        <!-- <p class="login-box-msg">Register a new membership</p> -->
        <form name="reg1" action="#" method="post">
          <div class="form-group has-feedback">
            <select name="tournament" required>
            <?php
                require 'functions.php';
                $db=new Functions();
                $db->test();
            ?>
        </select>
            </span>
          </div>
         <div class="form-group has-feedback">
            <select name="school_level" required>
            <option value="">SELECT School level</option>
            <option value="Elementary">Elementary</option>
            <option value="High School">High School</option>
            <option value="College">College</option></span>
            </select>
          </div>


     

          <div class="form-group has-feedback">
            <select name="sex" required>
            <option value="">SELECT GENDER</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option></span>
            </select>
          </div>
           <div class="form-group has-feedback">
            <select name="a_o" required>
            <option value="">SELECT if Advance or novice</option>
            <option value="advance">Advance</option>
            <option value="novice">Novice</option></span>
            </select>
          </div>

         <div class="form-group has-feedback">
            <select name="category" required>
			    <option selected disabled>Select an option below</option>
			    <option value="Fin Weight">Fin Weight</option>
				<option value="Fly Weight">Fly Weight</option>
				<option value="Bantam Weight">Bantam Weight</option>
				<option value="Feather Weight">Feather Weight</option>
				<option value="Light Weight">Light Weight</option>
				<option value="Welter Weight">Welter Weight</option>
				<option value="Light Middle Weight">Light Middle Weight</option>
				<option value="Middle Weight">Middle Weight</option>
				<option value="Light Heavy Weight">Light Heavy Weight</option>
				<option value="Heavy Weight">Heavy Weight</option>	
			  </select>
		  </div>
		  <title>Age of Empires III Summer Championship Brackets</title>
<header>
  <div class="big-title">Age of Empires III Summer Championship 2015</div>
  <div class="subtitle">Hosted by the ESO Community</div>
  <div class="placeholder">
    <div class="caption-info">&nbsp;&nbsp;Click on a match to see additional match content.<a class='caption-btn'>Gotcha!</a>&nbsp;</div>
    <br>
  </div>
</header>
<div id="mainContainer">
  <div id="main">
    <div id="matches">
    </div>
  </div>
  <div id="matchCallback"></div>
</div>
	  </div>
          <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" id="register">Match</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container-fluid">
		<?php 
		$con = mysqli_connect("localhost","root","","ttms");
		if(isset($_POST['submit'])){
	    
	    $tournament=$_POST['tournament'];
	    $a_o=$_POST['a_o'];
	    $school_level=$_POST['school_level'];
	    $sex = $_POST['sex'];
	    $category = $_POST['category'];

	    if(($tournament != NULL) && ($a_o != NULL) && ($school_level != NULL) && ($sex != NULL) && ($category != NULL)){

		$count = mysqli_query($con, "SELECT COUNT(*) as total FROM matchmaking WHERE tournament ='$tournament' GROUP BY tournament");
		$counted=mysqli_fetch_assoc($count);
		$sql1 = "SELECT * FROM matchmaking WHERE tournament='$tournament' GROUP BY tournament";
		$result = $con->query($sql1);
		foreach ($result as $row){
			echo'<h3 class="text-center">'."$tournament".'('."$sex".'|'."$a_o".'|'."$school_level".'|'."$category".')'.'</h3>';
			echo'<main id="tournament">';
			echo'<ul class="round round-1">';
			$num = $counted['total'];


			$sql1 = "SELECT * FROM matchmaking WHERE `tournament`='$tournament' and `advanceornovice` = '$a_o' 
					and `school_degree` = '$school_level' and `sex` = '$sex' and category = '$category' ORDER BY `statistic_score` DESC";

			$results = $con->query($sql1); 
			foreach ($results as $i=>$row){

				if ($i % 2 == 0) echo '<li class="spacer"><button>asdas</button>&nbsp;</li><li class="game game-top">'.$row['name'].'<span>'.$row['statistic_score'].'</span></li>';
			    echo'<li class="game game-spacer">&nbsp;</li>';


			   echo "string";
			    if ($i % 2 == 1) echo '<li class="game game-bottom"><button>asdas</button>'.$row['name'].'<span>'.$row['statistic_score'].'</li>';
			}
			echo'</ul>';
			echo'</main>';
			}
		}
	}	

	?>
	</div>
  </body>
</html>

