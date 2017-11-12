<?php 
	$id = $_REQUEST['id'];
	$con = mysqli_connect("localhost","ttms","ttms","ttms");
	$query = mysqli_query($con,"SELECT * FROM tournament WHERE id='$id'");
	$rules = mysqli_query($con,"SELECT * FROM rules WHERE status!='Old' AND tournament_id='$id'");
	$row=mysqli_fetch_assoc($query);
	$tournament=$row['name'];
	$count = mysqli_query($con,"SELECT COUNT(*) AS total FROM tournament_registration WHERE tournament='$tournament'");
	$total=mysqli_fetch_assoc($count);
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
<body>
	<?php $background = "background-image: url('images/tournaments/".$id.".jpg');";?>
	<div class="custom-bg" style="<?=$background?>">
		<div class="overlay">
			<h1 class="custom-text"><?=$row['name']?></h1>
		</div>
	</div>
	<div class="container pb-5">
		<h1>Tournament Details</h1><hr>
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<h3 style="margin-top: 0px;">Basic Details</h3>
				<h5 style="margin-top: 0px;">Tournament Name: <strong><?=$row['name']?></strong></h5>
				<h5>Date: <strong><?=date('F d, Y', strtotime($row['start_date']))?> - <?=date('F d, Y', strtotime($row['end_date']))?></strong></h5>
				<h5 style="margin-top: 0px;">Venue: <strong><?=$row['venue']?></strong></h5><hr>
				<h4 style="margin-top: 0px;">Players Registered: <strong><?=$total['total']?></strong></h4>
			</div>

			<div class="col-xs-12 col-md-8">
				<h3 style="margin-top: 0px;">Tournament Rules</h3>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>#</th>
							<th>Rule</th>
						</tr>
						<?php 
							$i=0;
							foreach($rules as $rows){
								$i++;
								echo '<tr>';
								echo '<td>'.$i.'</td>';
								echo '<td>'.$rows['rule'].'</td>';
								echo '</tr>';
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>