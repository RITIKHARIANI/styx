<?php // block any attempt to the filesystem

if (isset($_GET['file']) && !isset($_GET['fileid']) && basename($_GET['file']) == $_GET['file']) {
$filename = $_GET['file'];
} else {
$filename = NULL;
}

session_start();
$con = mysqli_connect("localhost", "id11595626_root", "password");
mysqli_select_db($con, "id11595626_styx");

if (isset($_GET['fileid'])) {
	$fileid = $_GET['fileid'];
}
else{
	$fileid = NULL;
}

if ($fileid) {
	$q = "select * from files where fileid='$fileid'";
	$result = mysqli_query($con, $q);
	// echo $result;
	$num = mysqli_num_rows($result);
	if ($num>0) {
		while ($row = $result->fetch_assoc()) {
			$filename = $row["location"];
		}
	}
	else
		$filename = "./storage/gui.png";
}

echo $filename."<br>";
$err = 'Sorry, the file you are requesting is unavailable.';
if (!$filename) {
	echo $err;
}
else {
	if (!$fileid) {
		$path = './storage/'.$filename;
	}
	else
		$path = $filename;

	if (file_exists($path) && is_readable($path)) {
		$size = filesize($path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		$file = @ fopen($path, 'rb');

		if ($file) {
		fpassthru($file);
		exit;
		} else {
		echo $err."#1";
		}
	} else {
	echo $err."#2";
	}
}
?>
