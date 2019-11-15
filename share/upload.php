<?php

session_start();
$con = mysqli_connect("localhost", "styx", "webtech123");
mysqli_select_db($con, "project");

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

echo "Uploading: ", $target_file, "<br>";
echo "Use the ID to share the file: <h1>", $fileid, "</h1><br>";
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
	if (move_uploaded_file($_FILES["fupload"]["tmp_name"], $target_file)) {
		chmod($target_file, 0755);
		echo "The file ". basename( $_FILES["fupload"]["name"]). " has been uploaded.";
		$insq = "insert into files values('$fileid','$target_file')";
		$result = mysqli_query($con, $insq);
		if ($result)
			echo "Success!";
		else
			echo "Failed!";
	}
	else{
		echo "Sorry mate";
	}
}
?>
<br>
<a href="./">Go back</a>