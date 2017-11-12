<?php 
	include('config.php');
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
	<style type="text/css">
		@media screen and (max-width: 767px) {
			.table-responsive {
			    width: 100%;
			    margin-bottom: 15px;
			    overflow-y: hidden;
			    -ms-overflow-style: -ms-autohiding-scrollbar;
			    border: 0px;
			}
		}
	</style>
	<?php 
		$x = $_GET['date']; 
	?>
	<div class="container">
		<h2>Previous Tournament for <?php echo $x?> </h2>
		<div class="table-responsive">
		<table class="table table-striped">
		<tr style="background-color: white;">
			<th>#</th>
			<th>Tournament Name</th>
			<th>Start Date.</th>
			<th>End Date</th>
			<th>Venue</th>
		</tr>
		<?php 
			$i=0;
			$con = mysqli_connect("localhost","ttms","ttms","ttms");
			$result = mysqli_query($con,"SELECT * FROM tournament WHERE DATE_FORMAT(start_date, '%M %Y') = '$x'");
				while($row = mysqli_fetch_array($result))
				{	
					$i++;
					echo "<tr>";
					echo "<td>" . $i . ".</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . date('F d, Y', strtotime($row['start_date']))  . "</td>";
					echo "<td>" . date('F d, Y', strtotime($row['end_date'])). "</td>";
					echo "<td>" . $row['venue'] . "</td>";
					echo "</tr>";
				}
				mysqli_close($con); 
		?>
		</table> 
		</div>
		<footer class="text-center" style="margin-top: 45px;"><p>Copyright &copy Simpas Group 2017. All Rights Reserved </p></footer>
	</div>
</body>
</html>