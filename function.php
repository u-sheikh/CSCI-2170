<?php

require_once 'serverLogin.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {  //using OO approach
die("Connection failed!" . mysqli_connect_error());
}

?>
