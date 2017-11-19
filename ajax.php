<?php 
	date_default_timezone_set('Asia/Manila');
	$con = mysqli_connect("localhost","ttms","ttms","ttms");
	if($_POST["action"]=="add_rule") {
		$rule = $_POST['rule'];
		if($rule == '') { echo "1"; }
		else {	
			$sql = "INSERT INTO rules(rule, tournament_id) values('$rule', 0)";
			$result = mysqli_query($con,$sql);
		}
	}

	if($_POST["action"]=="remove_rule") { $sql = mysqli_query($con,"UPDATE rules SET status='Old' WHERE id=".$_POST['id']); }

	if($_POST["action"]=="add_tournament") {
		$tournament = $_POST['tournament'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$venue = $_POST['venue'];

		$counterCheck = mysqli_query($con, "SELECT * FROM tournament WHERE name='$tournament'");
		if(mysqli_num_rows($counterCheck) == 1) { echo "Tournament Exist";} 
		else {
			if($tournament == '' ||  $start == '' || $end == '' || $venue == '') { echo "1"; }
			if($start <= date("Y-m-d") || $end <= date("Y-m-d") || $end < $start) { echo "2"; }
			else {
				$sql = "INSERT INTO tournament(name, start_date, end_date, venue) VALUES ('$tournament', '$start', '$end', '$venue')";
				$result = mysqli_query($con,$sql);
			}
		}
	}

	if($_POST["action"]=="register_coach") {
		$username = $_POST['usernames'];
		$password = $_POST['passwords'];
		$lastname = $_POST['lastnames'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$belt = $_POST['belt'];
		$gym = $_POST['gym'];
		$address = $_POST['address'];		
		if($username == '' ||  $password == '' || $lastname == '' || $firstname == '' || $middlename == '' || $sex == '' || $age == '' || $belt == '' || $gym == '' || $address == '' ) { echo "1"; }
		else {
			$sql = "INSERT INTO coaches(firstname, middlename, lastname, sex, age, belt, gym, address, username) VALUES ('$firstname', '$middlename', '$lastname', '$sex', '$age', '$belt', '$gym', '$address', '$username')";
			$sql1 = "INSERT INTO accounts(firstname, middlename, lastname, username, password, account_type) VALUES ('$firstname', '$middlename', '$lastname', '$username', '$password', 'Coach')";
			$result = mysqli_query($con,$sql);
			$result1 = mysqli_query($con,$sql1);
			echo $sql;
			echo $sql1;
		} 
	}

	if($_POST["action"]=="add_to_team") {
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$dateofbirth = $_POST['dateofbirth'];
		$coach = $_POST['coach'];
		$gym = $_POST['gym'];
		$weight = $_POST['weight'];
		$height = $_POST['height'];
		$firsttimer = $_POST['firsttimer'];
		$joinedmorethan = $_POST['joinedmorethan'];
		$joinedlessthan = $_POST['joinedlessthan'];
		$noviceoradvance = $_POST['noviceoradvance'];
		$skillrating = $_POST['skillrating'];
		$stamina = $_POST['stamina'];
		$speed = $_POST['speed'];
		$power = $_POST['power'];
		$achievement = $_POST['achievement'];
		$belt = $_POST['belt'];
		$degree = $_POST['degree'];
		$category = $_POST['category'];
		if($lastname == '' ||  $firstname == '' || $middlename == '' || $age == '' || $sex == '' || $dateofbirth == '' || $weight == '' || $height == '' || $gym == '' || $firsttimer == '' || $noviceoradvance == '' || $skillrating == '' || $stamina == '' || $speed == '' || $power == '' || $belt == '' || $degree == '' || $category == '') { echo "1"; }
		else {
			$sql = "INSERT INTO player(lastname, firstname, middlename, age, sex, dateofbirth, coach, gym, weight, height, firsttimer, joinedmorethan, joinedlessthan, noviceoradvance, skillrating, stamina, speed, power, achievement, belt, school_degree, category)  VALUES ('$lastname', '$firstname', '$middlename', '$age', '$sex', '$dateofbirth', '$coach', '$gym', '$weight', '$height', '$firsttimer', '$joinedmorethan', '$joinedlessthan', '$noviceoradvance', '$skillrating', '$stamina', '$speed', '$power', '$achievement', '$belt', '$degree', '$category')";
			$result = mysqli_query($con,$sql);
			echo $sql;
		} 
	}

	if($_POST["action"]=="get_belt") {
		$player = $_POST['player'];
		$sql = "SELECT belt FROM player WHERE CONCAT(firstname, ' ', middlename, ' ' , lastname) = '$player'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		echo $row['belt'];
	}

	if($_POST["action"]=="get_skilllevel") {
		$player = $_POST['player'];
		$sql = "SELECT noviceoradvance FROM player WHERE CONCAT(firstname, ' ', middlename, ' ' , lastname) = '$player'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		echo $row['noviceoradvance'];
	}

	if($_POST["action"]=="get_category") {
		$player = $_POST['player'];
		$sql = "SELECT category FROM player WHERE CONCAT(firstname, ' ', middlename, ' ' , lastname) = '$player'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		echo $row['category'];
	}

	if($_POST["action"]=="add-to-list"){
		$tournament = $_POST['tournament'];
		$coach = $_POST['coach'];
		$player = $_POST['player'];
		$playerid = $_POST['playerid'];
		$belt = $_POST['belt'];
		$skilllevel = $_POST['skilllevel'];
		$category = $_POST['category'];
		if($player == '') { echo "1"; }
		else {
			$sql = "INSERT INTO tournament_registration(coach, tournament, name, playerid, belt, advanceornovice, category) VALUES ('$coach', '$tournament', '$player', '$playerid','$belt', '$skilllevel', '$category')";
			$result = mysqli_query($con,$sql);
			echo $sql;
		}
	}

	if($_POST["action"]=="pay_up") {
		$tournament = $_POST['tournament'];
		$coach = $_POST['coach'];
		$sql = mysqli_query($con,"UPDATE tournament_registration SET status='Paid' WHERE coach='$coach' AND tournament='$tournament'");
	}

	if($_POST["action"]=="tournament-rules") {
		$id = $_POST['id'];
		$rule = $_POST['rule'];
		$sql = mysqli_query($con, "INSERT INTO rules(rule, tournament_id) values('$rule', '$id')");
	}

	if($_POST["action"]=="fuckingremoveme") {
		$sql = mysqli_query($con,"UPDATE rules SET status='Old' WHERE id=".$_POST['id']);
	}

	if($_POST["action"]=="update-rules") {
		$rule = $_POST['rule']; 
		$sql = mysqli_query($con,"UPDATE rules SET rule='$rule' WHERE id=".$_POST['id']); 
	}
?>