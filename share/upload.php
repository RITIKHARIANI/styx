<?php
if(isset($_COOKIE["username"]))
	$target_dir = "./storage/".$_COOKIE["username"]."/";
else
	$target_dir = "./storage/";
$target_file = $target_dir . basename($_FILES["fupload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

echo "Uploading: ", $target_file, "<br>";

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
	}
	else{
		echo "Sorry mate";
	}
}
?>