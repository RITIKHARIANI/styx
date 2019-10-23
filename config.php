<?php

$servername="localhost";
$username="username";
$password="password";
$dbname="mydb";
try{


$conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="CREATE TABLE myguests( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL,email VARCHAR(30)
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
$conn->exec($sql);
echo "table myguests has been created";
}
catch(PDOException $e)
{
    echo $sql."<BR>".$e->getMessage();

}

$conn=null;
?>