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
	<h3 class="text-center">Tournament for the Year of <?php echo $_GET['year']; ?></h3>
	<div class="table-responsive">
		<table class="table">
		  	<tr>
		  		<th>#</th>
		  		<th>Tournament Name</th>
		  		<th>Date the Tournament Started</th>
		  		<th>Date the Tournament Ended</th>
		  		<th>Venue</th>
		  	</tr>
		  	<?php
		  		$i=0;
		  		$year=$_GET['year'];
				$con = mysqli_connect("localhost","ttms","ttms","ttms");
				$sql = "SELECT DATE_FORMAT(start_date,'%M %D, %Y') AS start, DATE_FORMAT(end_date,'%M %D, %Y') AS end, venue, name FROM tournament WHERE YEAR(end_date)='$year'";
					$result = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{
						$i++;
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['start'] . "</td>";
						echo "<td>" . $row['end'] . "</td>";
						echo "<td>" . $row['venue'] . "</td>";		
						echo "</tr>";
					}
			?>
		  </table>
		</div>


	  	<?php
	  		$i=0;
	  		$year=$_GET['year'];
			$con = mysqli_connect("localhost","ttms","ttms","ttms");
			$tournament = mysqli_query($con, "SELECT tournament FROM tournament_registration GROUP BY tournament");
			foreach ($tournament as $rows) {
				echo "<h3 class='text-center'>".$rows['tournament']."</h3>";
				$tournamentName = $rows['tournament'];
				$sql = mysqli_query($con, "SELECT 
					tournament_registration.name, 
					tournament_registration.belt,
					tournament_registration.category,
					tournament_registration.coach,
					tournament.name as tournament
					FROM tournament_registration
					INNER JOIN tournament 
					ON tournament.name=tournament_registration.tournament
					WHERE tournament_registration.tournament='$tournamentName' ORDER BY tournament.name ASC");
				echo '
				<div class="table-responsive">
				<table class="table">
				  	<tr>
				  		<th>#</th>
				  		<th>Player Name</th>
				  		<th>Tournament Entered</th>
				  		<th>Belt</th>
				  		<th>Category</th>
				  		<th>Coach</th>
				  	</tr>
				';
				foreach ($sql as $row) {
					$i++;
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['tournament'] . "</td>";
					echo "<td>" . $row['belt'] . "</td>";
					echo "<td>" . $row['category'] . "</td>";
					echo "<td>" . $row['coach'] . "</td>";		
					echo "</tr>";
				}
				echo '</table></div>';
			}
		?>
		  

		<br><br><p class="text-center"><i>List of tournaments for the year of <?php echo $_GET['year']; ?></i></p>
		<script type="text/javascript">	function start() { 	window.print(); } </script>
</body>
</html>