<?php
	/*$con = mysql_connect('localhost','root','D3n3vy&t1z01');
	mysql_select_db('chronos', $con) or die("No se pudo conectar a la base de datos");*/

	$servername = "localhost";
	$username = "siem";
	$password = "Academia1234/";
	$dbname = "siem";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

?>