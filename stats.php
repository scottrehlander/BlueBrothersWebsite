<?php 
	session_start(); 
	require("includes/BBDB.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Blues Brothers Hockey - NESHL</title>
<link href="includes/style.css" rel="stylesheet" type="text/css" />
</head>
<?php #Free Template by Templatefusion.org ?>
<body>

	<?php
	
	
		$con = getDBConnection();
		if(	!empty($_SESSION['userName']))
		{
			$userName = $_SESSION['userName'];
			$teamID = $_SESSION['teamID'];
		}
		
	?>

	<div id="wrap">

		<div class="header"><p>Blues<span>Brothers</span><sup>Marlborough C2 NESHL</sup></p>
		</div>
		
<div id="navigation">
			<ul class="glossymenu">
			
				<li><a href="index.php"><b>Home</b></a></li>
				<li><a href="games.php" class="current"><b>Games</b></a></li>
				<li><a href="stats.php"><b>Stats</b></a></li>
				<li><a href="roster.php"><b>Roster</b></a></li>
				<li><a href="http://www.rehlander.com" class="current"><b>rehlander.com</b></a></li>

			</ul>
		</div>
	  <div id="body">
		<br>
		
		<h1>Stats</h1>
			<center>
				<p>
					<table width="90%" border="1" cellpadding="0" cellspacing="0">
						<tr bgcolor="White"><td><b><font color="black">Player</font></b></td><td><b><font color="black">Goals</font></b></td><td><b><font color="black">Assists</font></b></td><td><b><font color="black">Points</font></b></td></tr>
						<?php
							$goalRows = getGoals($con);
							$goals = array();
							while($row = mysql_fetch_array( $goalRows ))
							{
								if(!array_key_exists($row['playerName'], $goals))
									$goals[$row['playerName']] = 0;
								$goals[$row['playerName']] += $row['goalCount'];
							}
							
							$assistRows = getAssists($con);
							$assists = array();
							while($row = mysql_fetch_array( $assistRows ))
							{
								if(!array_key_exists($row['playerName'], $assists))
									$assists[$row['playerName']] = 0;
								$assists[$row['playerName']] += $row['assistCount'];
							}
							
							$players = getPlayers($con);
							while($row = mysql_fetch_array( $players ))
							{
								$goalCount = 0;
								if(array_key_exists($row['playerName'], $goals))
									$goalCount = $goals[$row['playerName']];
								$assistCount = 0;
								if(array_key_exists($row['playerName'], $assists))
									$assistCount = $assists[$row['playerName']];
									
								echo("<tr><td><b> " . $row['playerName'] . "</b></td><td><b> " . $goalCount . "</b></td><td><b> " . $assistCount . "</b></td><td><b> " . ($goalCount + $assistCount) . "</b></td></tr>");
							}
							
							
						?>
					</table>
				</p>
			</center>
		<br/><br/>
		<br/><br/>
            
		</div>
		
		<div id="footer">&copy;2009 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
