<!DOCTYPE html>
<html>
<head>
	<title>Styx-Files Hosted</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="./styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src='../js/main.js'></script>
	<!-- <style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}
		</style> -->
</head>
<body>
	<!--Center Nav Bar-->
	<nav class="navbar justify-content-center">
			<a class="nav-link active" href="#">Machine Info</a>
			<a class="nav-link" href="#">Info</a>
			<a class="nav-link" href="#">Info</a>
	</nav>
	<!-- Left Side Bar-->
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebarleft">
			<div class="sidebar-header">
				<h3 class="text-center">Functionality</h3>
			</div>
			<ul class="nav flex-column">
					<li class="nav-item">
					  <a class="nav-link active" href="#">Active</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				  </ul>	
		</nav>
	</div>
	<div class="middle">
		<nav id="midbar">
		<h1>Files in storage</h1>
		<ul>
			<?php
				$path = '../share/storage/';
				$files = array_diff(scandir($path), array('.', '..'));
				foreach ($files as $file) {
					echo "<li>$file</li>";
				}
			?>
		</ul>
		</nav>
	<!-- Right SideBar-->
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebarright">
			<div class="sidebar-header">
				<h3 class="text-center">List of Users Online</h3>
			</div>
			<div>
				<p class="text-center"> User 1</p>
				<p class="text-center"> User 2</p>
				<p class="text-center"> User 3</p>
			</div>
	
		</nav>
	</div>
	</body>
</html>