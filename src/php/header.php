<?php

	//open database
	$db = mysqli_connect('localhost', 'root', '') or
	die(mysqli_error());
	mysqli_select_db($db,"book") or die(mysqli_error($db));
	session_start();
	
	echo ('<!DOCTYPE html>
			<html lang="en">
				<head>
					<title>Library	</title>
					<link rel="stylesheet" type="text/css" href="../css/style.css" >
					<meta charset="UTF-8">
				</head>
				
				<body>
					<div id= "canvas">
						<div id="all">
							<div id="header">
								<header>
									<h2> Library </h2>
								</header>
							</div>
							<div class="main">
								<div id="nav">
									<nav>
										<ul>
											<li><a href="search.php">Search</a></li>
											<li> &nbsp; | &nbsp;</li>
											<li><a href="view_reserved.php">View Reserved</a></li>
											<li> &nbsp; | &nbsp;</li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</nav>
								</div>');
?>