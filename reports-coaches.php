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
<body onload="start()" style="height: auto;">
	<style type="text/css"> ::-webkit-scrollbar { display: none; } </style>
	<h3 class="text-center">List of Coaches</h3>
	<div class="table-responsive">
		<table class="table">
		  	<tr>
		  		<th>#</th>
		  		<th>Name</th>
		  		<th>Sex</th>
		  		<th>Age</th>
		  		<th>Belt</th>
		  		<th>Gym</th>
		  		<th>Gym Address</th>
		  	</tr>
		  	<?php
		  		$i=0;
				$con = mysqli_connect("localhost","ttms","ttms","ttms");
				$sql = "SELECT CONCAT(firstname, ' ', middlename, ' ', lastname) as name, coaches.* FROM coaches ORDER BY lastname, firstname";
					$result = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{
						$i++;
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['sex'] . "</td>";
						echo "<td>" . $row['age'] . " Years Old</td>";
						echo "<td>" . $row['belt'] . "</td>";
						echo "<td>" . $row['gym'] . "</td>";
						echo "<td>" . $row['address'] . "</td>";			
						echo "</tr>";
					}
					mysqli_close($con);
			?>
		  </table>
		</div>
		<br><br><p class="text-center"><i>List of coaches in our system as of <?php echo $today = date("F j, Y - g:iA");  ?></i></p>
		<script type="text/javascript">	function start() { 	window.print(); } </script>
</body>
</html>