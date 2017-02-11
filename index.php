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
	
		//$con = getDBConnection();
		//if(	!empty($_SESSION['userName']))
		//{
		//	$userName = $_SESSION['userName'];
		//	$teamID = $_SESSION['teamID'];
		//}
		
		//if ($_POST['submit']) 
		//{
		//	$name = $_POST['name'];
		//	$comment = $_POST['chatter'];
		//	
		//	insertWallChatter($con, $name, $comment);
		//}
		
	?>

	<div id="wrap">

		<div class="header"><p>Blues<span>Brothers</span><sup>Marlborough C2 NESHL</sup></p>
		</div>
		
<div id="navigation">
			<ul class="glossymenu">
			
				<li><a href="index.php" class="current"><b>Home</b></a></li>
				<li><a href="games.php"><b>Games</b></a></li>
				<li><a href="stats.php"><b>Stats</b></a></li>
				<li><a href="roster.php"><b>Roster</b></a></li>
				<li><a href="http://www.rehlander.com" class="current"><b>rehlander.com</b></a></li>
			</ul>
		</div>
	  <div id="body">
		<br><br>
		
		<h1>6-30-09</h1>
			<p>Hi guys, thanks for visiting the new official Blues Brothers website.  Stats will be added shortly along with a full roster and email addresses of participating players.  You can email me at srehlander(at)gmail.com  Let me know if there is anything else you would like added to the site.</p>
			<br/>
			<br/>
		
		<h1>Recent Chatter</h1>
		<table width="90%">
		<?php
			$chatter = getWallChatter($con);
			while($row = mysql_fetch_array( $chatter ))
			{
				echo("<tr><td>" . $row['postTime'] . "</td><td><b>" . $row['posterName'] . ":</b></td><td> " . $row['text'] . "</td></tr>");
			}
		?>
		</table>
		<br><br>
		
		<p align="left"><b>Put in your name and some text to post to the Blues Brothers home page:</b></p><br>
		<form id="chatterForm" name="chatterForm" method="post" action="index.php">
		
		  <table width="92%">
			<tr>
			  <td width="53%" valign="top">Name:</td>
			  <td width="47%"><input type="text" name="name" /></td>
			</tr>
			<tr>
			  <td valign="top">What do you want to say: </td>
			  <td><textarea name="chatter" cols="30" rows="6"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="submit" value="Submit" />
				</td>
			</tr>
		  </table>
		  <br>
		</form>
			
			<img src="images/neshl.jpg"/>
	
		<br/><br/>
		<br/><br/>
            
		</div>
		
		<div id="footer">&copy;2009 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
