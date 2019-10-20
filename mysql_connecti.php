<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	 echo "<script type='text/javascript'>alert('Retry , connection error!');
           window.location='login.html';
		 </script>";
         exit();
}

?>