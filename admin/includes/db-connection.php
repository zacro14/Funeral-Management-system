<?php
	$conn = new mysqli("localhost","root","","fms");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>