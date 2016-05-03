<?php
	$servername = "localhost";
	$username = "Academia";
	$password = "Academia1234/";
	$dbname = "Academia";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

?>