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

</head>
<button id="goback"><a href="../" id="homer">Home</a></button>
<button id="logsout"><a href="./logout.php" id="lgoutbye">Logout</a></button>
<body>
	<!--Center Nav Bar-->
	<nav class="navbar justify-content-center" id="mid">
			<span class="info">: <?php echo $_SERVER['SERVER_NAME'] ?> :</span>
			<span class="info"><?php
			if(isset($_COOKIE["username"]))
				echo $_COOKIE["username"], "'s home";
			else
				echo "Styx public home";
			?>
			</span>
			<span class="info">: <?php echo $_SERVER['REQUEST_URI'] ?> :</span>
	</nav>
	<!-- Left Side Bar-->
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebarleft">
			<div class="sidebar-header" id="leftinfo">
				<h3 class="text-center">Functionality</h3>
			<ul class="nav flex-column" id="listbuto">
				<li class="nav-item">
					<button class="wicker">ADD FILES</button>
				</li>
				<li class="nav-item">
					<button class="wicker">REMOVE FILES</button>
				</li>
				<li class="nav-item">
					<button class="wicker">STOP</button>
				</li>							
			</ul>
			</div>	
		</nav>
	</div>
	<div class="middle">
		<nav id="midbar">
			<br>
		<h1>Files in storage</h1>
		<br><br><br>
		<ul>
			<?php
				$path = '../share/storage/';
				if(isset($_COOKIE["username"]))
					$path = '../share/storage/'.$_COOKIE["username"];
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
			<div class="sidebar-header" id="rightinfo">
				<h3 class="text-center">Users Online</h3>
			<!-- </div>
			<div> -->
				<p class="text-center"> Rehan</p>
				<p class="text-center"> Ritik</p>
				<p class="text-center"> Romaanchan</p>
			</div>
	
		</nav>
	</div>
	</body>
	<script type="text/javascript" src="dyno.js"></script>
</html>