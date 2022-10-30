<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$dbname = 'todolistDB';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn){
    die('Could not connect: '. mysqli_error());
}

echo "Connected successfully";

$sql = 'CREATE DATABASE phpNodejs';

$run = mysqli_query($conn, $sql);

if(!$run){

    die('Could not create database: '. mysqli_error());

}



echo "Database phpNodejs created successfully\n";

mysqli_close($conn);

?>