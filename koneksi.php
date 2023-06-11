<?php 
/**
* using mysqli_connect for database connection
*/
$databaseHost = 'localhost';
$databaseName = 'latujikom';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>