<?php

	function getDBConnection()
	{
		$dbServer = "db1935.perfora.net";
		$dbName = "db290817425";
		$dbUser = "dbo290817425";
		$dbPassword = "krb8KcvK";
		
		$con = mysql_connect($dbServer, $dbUser, $dbPassword);
		if(!$con)
			die(mysql_error());
			
		mysql_select_db($dbName, $con);

		return $con;
	}
	
	function getGames($con)
	{
		$sql = "SELECT * FROM games ORDER BY gameDate";
		return prepareCommand($sql, $con);
	}
	
	function getPlayers($con)
	{
		$sql = "SELECT * FROM players ORDER BY playerName";
		return prepareCommand($sql, $con);
	}
	
	function getGoals($con)
	{
		$sql = "SELECT g.*, p.playerName FROM goals g inner join players p on g.playerId = p.playerId";
		return prepareCommand($sql, $con);
	}

	function getAssists($con)
	{
		$sql = "SELECT a.*, p.playerName FROM assists a inner join players p on a.playerId = p.playerId";
		return prepareCommand($sql, $con);
	}
	
	function insertWallChatter($con, $text, $posterName)
	{
		$sql = "INSERT into wall_chatter (posterName, text) VALUES ('" . $text . "', '" . $posterName . "')";
		return prepareCommand($sql, $con);
	}
	
	function getWallChatter($con)
	{
		$sql = "SELECT * FROM wall_chatter ORDER BY postTime DESC";
		return prepareCommand($sql, $con);
	}
	
	function prepareCommand($sql, $con)
	{
		$result = mysql_query($sql, $con) or die(mysql_error());
		return $result;
	}
?>