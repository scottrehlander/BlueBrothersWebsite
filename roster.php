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
				<li><a href="games.php"><b>Games</b></a></li>
				<li><a href="stats.php"><b>Stats</b></a></li>
				<li><a href="roster.php" class="current"><b>Roster</b></a></li>
				<li><a href="http://www.rehlander.com" class="current"><b>rehlander.com</b></a></li>

			</ul>
		</div>
	  <div id="body">
		<br>
		
		<h1>Roster</h1>
			<center>
				<p>
					<table width="90%" border="1" cellpadding="0" cellspacing="0">
						<tr bgcolor="White"><td><b><font color="black">Name</font></b></td><td><b><font color="black">E-Mail</font></b></td><td><b><font color="black">Phone Number</font></b></td></tr>
						<?php
							$players = getPlayers($con);
							while($row = mysql_fetch_array( $players ))
							{
								echo("<tr><td><b> " . $row['playerName'] . "</b></td><td><b> " . $row['emailAddress'] . "</b></td><td><b>" . $row['phoneNumber'] . "</b></td></tr>");
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
