<?php 
$db_host = "localhost";
$db_database = "ylin70_wnm_608";
$db_username = "root";
$db_password = "admin";

$mysqli = new mysqli($db_host,$db_username,$db_password,$db_database);
if ($mysqli->connect_errno) {
	die($mysqli->connect_error);
}


 ?>
