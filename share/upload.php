<?php

ini_set('upload_max_filesize', "100M");
ini_set('post_max_size', "101M");

session_start();
$con = mysqli_connect("localhost", "id11595626_root", "password");
mysqli_select_db($con, "id11595626_styx");

if(isset($_COOKIE["username"]))
	$target_dir = "./storage/".$_COOKIE["username"]."/";
else
	$target_dir = "./storage/";
$target_file = $target_dir . basename($_FILES["fupload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$lochash = sha1($target_file);
$fileid = substr($lochash, 0, 6);
$fileid = strtoupper($fileid);

$q = "select * from files where fileid = '$fileid'";
$result = mysqli_query($con, $q);
// echo $result;
$num = mysqli_num_rows($result);
if ($num==1) {
	$uploadOk = 0;
}


if (file_exists($target_file)) {
	echo "Already there<br>";
	$uploadOk = 0;
}

if ($uploadOk == 0) {
	echo "Cannot upload";
}
else{
	fopen($target_file, 'w');
	echo "Uploading: ", $target_file, "<br>";
	if (move_uploaded_file($_FILES["fupload"]["tmp_name"], $target_file)) {
		chmod($target_file, 0755);
		echo "File: ". basename( $_FILES["fupload"]["name"]). " has been uploaded.<br>";
		$insq = "insert into files values('$fileid','$target_file')";
		$result = mysqli_query($con, $insq);
		if ($result)
			echo "Success!<br>";
		else
			echo "Failed!";
		echo "Use the ID to share the file: <h1>", $fileid, "</h1><br>";
	}
	else{
		echo "Sorry mate";
	}
}
?>
<br>
<a href="./">Go back</a>