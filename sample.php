<?php 
error_reporting(0);
include dirname(__FILE__) . '/config.php';

$list_tournaments = array();
$query = mysqli_query($con, 'SELECT * FROM `tournament` WHERE 1');
if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_object($query)){
		$list_tournaments[$row->id] = $row->name;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tournament Matchmaking</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.bracket.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.bracket.min.css">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<style type="text/css">
		.label { color: #000; font-size: 12px; margin-top: 5px; }
		.container-bg { background: #171717; } 
		.control-label, .container-bg h3, .container-bg p { color: #dadada; }
		.container-bg h1 { color: #fff; }
		hr { border-top: 1px solid #636363; }
		body { background-color: #ececec; }
		#style-2::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); border-radius: 10px; background-color: #F5F5F5; }
		#style-2::-webkit-scrollbar { background-color: #F5F5F5; height: 10px; width: 10px; }
		#style-2::-webkit-scrollbar-thumb { border-radius: 10px; -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3); background-color: #313131; }
	</style>
</head>
<body>
<div class="container-bg">
	<div class="container pt-2 pb-2">
		<h1>Tournament Matchmaking System</h1>
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<form method="post" role="form" class="form-horizontal">
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">Tournament:</label>
						<div class="col-sm-10">
							<select name="tid" id="tid" class="form-control">
								<option value="" disabled selected>Select a tournament</option>
								 <?php
								 if(!empty($list_tournaments)){
									 foreach($list_tournaments as $tid => $tourn){
										 echo '<option value="'. $tid .'"'.(@$_POST['tid'] == $tid ? ' selected' : '').'>'.$tourn.'</option>';
									 }
								 }
								 ?>
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">School Level:</label>
						<div class="col-sm-10">
							<select name="school_level" id="school_level" required class="form-control">
								<option value="" disabled selected>Select a school level</option>
								<option value="Elementary"<?= (@$_POST['school_level'] == 'Elementary' ? ' selected' : '') ?>>Elementary</option>
								<option value="High School"<?= (@$_POST['school_level'] == 'High School' ? ' selected' : '') ?>>High School</option>
								<option value="College" <?= (@$_POST['school_level'] == 'College' ? ' selected' : '') ?>>College</option></span>
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-10">
							<select name="sex" id="sex" required class="form-control">
								<option value="" disabled selected>Select a gender</option>
								<option value="Male"<?= (@$_POST['sex'] == 'Male' ? ' selected' : '') ?>>Male</option>
								<option value="Female"<?= (@$_POST['sex'] == 'Female' ? ' selected' : '') ?>>Female</option></span>
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">Skill Level</label>
						<div class="col-sm-10">
							<select name="a_o" id="a_o" required class="form-control"> 
								<option value="" disabled selected>Select an option down below</option>
								<option value="advance"<?= (@$_POST['a_o'] == 'advance' ? ' selected' : '') ?>>Advance</option>
								<option value="novice"<?= (@$_POST['a_o'] == 'novice' ? ' selected' : '') ?>>Novice</option></span>
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
							<select name="category" id="category" required class="form-control">
							    <option selected disabled>Select a category</option>
							    <option value="Fin Weight"<?= (@$_POST['category'] == 'Fin Weight' ? ' selected' : '') ?>>Fin Weight</option>
								<option value="Fly Weight"<?= (@$_POST['category'] == 'Fly Weight' ? ' selected' : '') ?>>Fly Weight</option>
								<option value="Bantam Weight"<?= (@$_POST['category'] == 'Bantam Weight' ? ' selected' : '') ?>>Bantam Weight</option>
								<option value="Feather Weight"<?= (@$_POST['category'] == 'Feather Weight' ? ' selected' : '') ?>>Feather Weight</option>
								<option value="Light Weight"<?= (@$_POST['category'] == 'Light Weight' ? ' selected' : '') ?>>Light Weight</option>
								<option value="Welter Weight"<?= (@$_POST['category'] == 'Welter Weight' ? ' selected' : '') ?>>Welter Weight</option>
								<option value="Light Middle Weight"<?= (@$_POST['category'] == 'Light Middle Weight' ? ' selected' : '') ?>>Light Middle Weight</option>
								<option value="Middle Weight"<?= (@$_POST['category'] == 'Middle Weight' ? ' selected' : '') ?>>Middle Weight</option>
								<option value="Light Heavy Weight"<?= (@$_POST['category'] == 'Light Heavy Weight' ? ' selected' : '') ?>>Light Heavy Weight</option>
								<option value="Heavy Weight"<?= (@$_POST['category'] == 'Heavy Weight' ? ' selected' : '') ?>>Heavy Weight</option>	
							  </select>
						</div>
					</div>
					<hr><div class="text-right"><button class="btn btn-primary btn-sm pull-right" type="submit">Start Matching</button></div>
				</form>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3>Instructions</h3>
				<p>Welcome to the Tournament Matchmaking System! To get started, all we have to do is to fill up the form on the left. Remember to complete everything by choosing an option for every field. By doing so, we will have be able to match the players successfully.</p>
			</div>
		</div>
	</div>
</div>

<div class="container" id="style-2" style="overflow: auto;background-color: white; padding: 10px; margin-top: 20px; margin-bottom: 20px;">
<?php 
$teams_array = array();
$team_match_array_db = array();

$match_bracket = array();
$score_per_round = [];

// Get tournament
if(isset($_POST['tid'])){
	$tid = $_POST['tid'];
	if(is_numeric($tid)){
		$tid = mysqli_real_escape_string($con, $tid);
		// Get tournament name
		$q = mysqli_query($con, 'SELECT `id`,`name` FROM `tournament` WHERE `id` = '. $tid);
		if(mysqli_num_rows($q) > 0){
			$tournament = mysqli_fetch_object($q);

			$a_o=$_POST['a_o'];
			$school_level=$_POST['school_level'];
			$sex = $_POST['sex'];
			$category = $_POST['category'];

			$qstr = "SELECT * FROM matchmaking WHERE 
			tournament = '". $tournament->name ."' AND advanceornovice = '$a_o' AND school_degree = '$school_level' AND sex = '$sex' AND category = '$category' ORDER BY statistic_score DESC";
			$query = mysqli_query($con, $qstr);
			//echo mysqli_num_rows($query);
			if(mysqli_num_rows($query)==0){
				echo "<h4 class='text-center'>No Results</h4>";
			}
			else {
				while($row = mysqli_fetch_assoc($query)){
					$teamName = $row['name'].' <strong>'.$row['statistic_score'].'%</strong>';
					$teams_array[] = $teamName;

					if(empty($team_match_array_db)){
						$team_match_array_db[] = array($teamName);
					}else{
						$check = $team_match_array_db[count($team_match_array_db)-1];
						if(count($check) == 2){
							$team_match_array_db[] = array($teamName);
						}else{
							$team_match_array_db[count($team_match_array_db)-1][] = $teamName;
						}
					}
				}
			}
			// Get results if found
			$q = mysqli_query($con, 'SELECT * FROM `match_results` 
					WHERE `tournament_id` = ' . $tournament->id." AND advanceornovice = '$a_o' AND school_level = '$school_level' AND sex = '$sex' AND category = '$category'");
			if(mysqli_num_rows($q) > 0){
				$result = mysqli_fetch_object($q);
				$jsonRes = json_decode($result->result_data);
				$score_per_round = $jsonRes->results;
				$team_match_array_db = $jsonRes->teams;
				$has_result_data = true;
			}
			
		}
	}	
}


// Check if team size is even
if(count($team_match_array_db)%2 > 0)
	$team_match_array_db[] = array(null, null);

// Check if last array has partner

$last_team_slot = $team_match_array_db[count($team_match_array_db)-1];
if(!isset($last_team_slot[1]))
	$team_match_array_db[count($team_match_array_db)-1][1] = null;


$match_remaining = count($team_match_array_db);
$match_bracket = $team_match_array_db;



if(isset($_POST['tid'])){?>
<div id="match-canvas"></div>


<button type="button" class="btn btn-danger" id="btnResetMatch"<?= (isset($has_result_data) ? ' style="display:block;"' : 'style="display:none;"') ?>><span class="glyphicon glyphicon-refresh"></span> Reset Match</button>
	<script type="text/javascript">
	$(function(){
		$("#btnResetMatch").on('click', function(){
			var conf = confirm('Are you sure you want to reset this match?');
			if(conf){
				$.post('sample-ajax-save.php', { action : 'clearMatch', tid : $("#tid").val(), 
				school_level  : $("#school_level").val(), sex : $("#sex").val(), a_o : $("#a_o").val(), 
				category : $("#category").val()
				}, 
				function(response){
					if(response.status > 0)
						$('form').submit();
				}, 'json');	
			}
		});
	});
</script>


<script type="text/javascript">
$(document).ready(function(){

	var singleElimination = {
		"teams": <?= json_encode($team_match_array_db) ?>,
		"results": <?= json_encode($score_per_round) ?>
	};

	/*
	// Results
	json_encode($score_per_round)
	*/


	 /* Data for autocomplete */
	var acData = <?= json_encode($teams_array) ?>;
 
	/* If you call doneCb([value], true), the next edit will be automatically 
	activated. This works only in the first round. */
	function acEditFn(container, data, doneCb) {
		var input = $('<input type="text">')
		input.val(data)
		input.autocomplete({ source: acData })
		input.blur(function() { doneCb(input.val()) })
		input.keyup(function(e) { if ((e.keyCode||e.which)===13) input.blur() })
		container.html(input)
		input.focus()
	}
	
	function acRenderFn(container, data, score, state) {
		switch(state) {
			case 'empty-bye':
			container.append('No Team')
			return;
			case 'empty-tbd':
			container.append('TBD')
			return;
		
			case 'entry-no-score':
			case 'entry-default-win':
			case 'entry-complete':
			/*
			var fields = data.split(':')
			if (fields.length != 2)
				container.append('<i>INVALID</i>')
			else
				container.append('<img src="site/png/'+fields[0]+'.png"> ').append(fields[1])
				*/
			container.append(data);
			return;
		}
	}

	function saveFn(data) {
	  if($("#tid").val() > 0){
		$.post('sample-ajax-save.php', { action : 'saveMatch', tid : $("#tid").val(), 
			school_level  : $("#school_level").val(), sex : $("#sex").val(), a_o : $("#a_o").val(), 
			category : $("#category").val(),
			data : JSON.stringify(data) }, 
			function(response){
				if(response.status > 0){
					$("#btnResetMatch").show();
					console.log(response.message);
				}
		}, 'json');
	  }
	}

	 $('#match-canvas').bracket({
	 	  //disableToolbar : true,
		  disableTeamEdit : false,
	 	  skipConsolationRound: true,
	      init: singleElimination,
	      teamWidth : 280,
	      scoreWith : 100,
	      matchMargin : 60,
	      roundMargin : 90,
	      save : saveFn,
	      decorator: {
	       	  edit: acEditFn,
              render: acRenderFn
         }
  	});
});
</script>
<?php }?>


</div>
</body>
</html>