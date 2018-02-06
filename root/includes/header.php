<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>My Website</title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/bjqs.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
	include_once 'db_connect.php'; 
	$data = array();
	if(!isset($_GET['category'])){
		$result = $mysqli->query("SELECT * FROM product");
	}else{
		$result = $mysqli->query("SELECT * FROM product WHERE category=".$_GET['category']);
	}
	
	if($mysqli->errno) die($mysqli->error);
	while ($row = $result->fetch_object()) {
		$data[] = $row;	
	}
	
?>
<header class="clearfix">
	<hgroup>
		<h1><a href="index.php">logo</a></h1>
		<!-- http://lukyvj.github.io/menu-to-cross-icon/ -->
		<span id="x"></span>
	</hgroup>
	<nav class="box-center">
		<ul class="nav-menu">
			<li><a href="index.php?category=1">Inspire</a></li>
			<li><a href="index.php?category=2">Phantoms</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Search</a></li>
		</ul>
	</nav>
</header>
<div class="headerfixed"></div>