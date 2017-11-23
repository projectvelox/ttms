<?php 
	include('session.php');
	include('config.php');
	if(!isset($_SESSION['login_user'])){ header("location:index.php"); }
	$con = mysqli_connect("localhost","ttms","ttms","ttms");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Taekwondo Tournament Matching System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="images/favicon.ico">
</head>
<body onload="startPrint()">
	
	<h3 class="text-center"><?=$_GET['name']?></h3><br>
	<div class="table-responsive">
		<table class="table table-striped"> 
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Sex</th>
				<th>Coach</th>
				<th>Belt</th>
				<th>School Degree</th>
			</tr>	
		   	<?php
		   		$name = $_GET['name'];
				$result = mysqli_query($con,"SELECT * FROM matchmaking WHERE tournament = '$name'");
				$i=0;
				while($row = mysqli_fetch_array($result))
				{
					$i++;
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$row['name'].'</td>';
					echo '<td>'.$row['sex'].'</td>';
					echo '<td>'.$row['coach'].'</td>';
					echo '<td>'.$row['belt'].'</td>';
					echo '<td>'.$row['school_degree'].'</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
	<script type="text/javascript"> function startPrint() { window.print(); } </script>
</body>
</html>