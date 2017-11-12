<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style type="text/css">
		.match { position: relative; }
		.bracket { float: right; clear: left; }
		.round { position: relative; width: 100px; margin-right: 40px; float: left; }
		.teamContainer { z-index: 1; position: relative; float: left; }
		.team:first-child { border-color: #ccc; }
		.team.lose div.score { color: #900; }
		.team.lose { background-color: #ddd; color: #999; }
		.team.win div.score { color: #060; }
		.team:first-child { border-bottom: 1px solid #999; }
		.team { margin: 1px; border: 1px solid #ccc; }
		.team {  position: relative; z-index: 1; float: left; background-color: #eee; width: 100px; cursor: default; }
		.team div.label { padding: 3px;  position: absolute; width: 70px; height: 22px; white-space: nowrap; overflow: hidden; }
		.editable { cursor: pointer; }
		.team .score { border-left: 1px solid #ccc; background-color: transparent; }
		div.score {
		    float: right;
		    padding: 3px;
		    background-color: hsla(0,0%,100%,.3);
		    text-align: center;
		    width: 20px;
		}
		.connector { border: 2px solid #666; border-left-style: none; position: absolute; z-index: 1; }
		.connector div.connector { border: 0; border-bottom: 2px solid #666; height: 0; position: absolute; }
		#bracketWrapper, div.jQBracket {
		    position: fixed;
		}

	</style>
</head>
<body>
<div id="bracketWrapper">
	<div class="jQBracket">
		<div class="bracket" style="height: 128px;">
			<div class="round">
				<div class="match" style="height: 64px;">
					<div class="teamContainer" style="top: 5.5px;">
						<div class="team lose" data-resultid="team-0" data-teamid="0">
							<div class="label editable">Team 1</div>
							<div class="score editable" data-resultid="result-0">22</div>
						</div>
						<div class="team win" data-resultid="team-1" data-teamid="1">
							<div class="label editable">Team 2</div>
							<div class="score editable" data-resultid="result-1">2</div>
						</div>
						<div class="connector" style="height: 32px; width: 20px; right: -22px; top: 13px; border-bottom: none;">
							<div class="connector" style="width: 20px; right: -20px; bottom: 0px;"></div>
						</div>
					</div>
				</div>
				<div class="match" style="height: 64px;">
					<div class="teamContainer" style="top: 6px;">
						<div class="team win" data-resultid="team-2" data-teamid="2">
							<div class="label editable">Team 3</div>
							<div class="score editable" data-resultid="result-2">11</div>
						</div>
						<div class="team lose" data-resultid="team-3" data-teamid="3">
							<div class="label editable">Team 4</div>
							<div class="score editable" data-resultid="result-3">3</div>
						</div>
						<div class="connector" style="height: 6px; width: 20px; right: -22px; bottom: 39.75px; border-top: none;">
							<div class="connector" style="width: 20px; right: -20px; top: 0px;"></div>
						</div>
					</div>
				</div>
				<div class="match" style="height: 64px;">
					<div class="teamContainer" style="top: 6px;">
						<div class="team win" data-resultid="team-2" data-teamid="2">
							<div class="label editable">Team 5</div>
							<div class="score editable" data-resultid="result-2">11</div>
						</div>
						<div class="team lose" data-resultid="team-3" data-teamid="3">
							<div class="label editable">Team 6</div>
							<div class="score editable" data-resultid="result-3">3</div>
						</div>
						<div class="connector" style="height: 6px; width: 20px; right: -22px; bottom: 39.75px; border-top: none;">
							<div class="connector" style="width: 20px; right: -20px; top: 0px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="round">
				<div class="match" style="height: 64px;">
					<div class="teamContainer np" style="position: absolute; bottom: -26.5px;">
						<div class="team" data-teamid="1">
							<div class="label editable">Team 2</div>
							<div class="score editable" data-resultid="result-4">--</div>
						</div>
						<div class="team" data-teamid="2">
							<div class="label editable">Team 3</div>
							<div class="score editable" data-resultid="result-5">--</div>
						</div>
					</div>
				</div>
				<div class="match" style="height: 64px;">
					<div class="teamContainer np" style="top: 53px;">
						<div class="team" data-teamid="0">
							<div class="label editable">Team 5</div>
							<div class="score editable" data-resultid="result-6">--</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>