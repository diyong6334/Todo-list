<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'todo';

$connection = mysqli_connect($host, $username, $password, $dbname) or die("Unable to conect to the database Server");

?>