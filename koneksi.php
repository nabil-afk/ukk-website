<?php
$databaseHost = 'localhost';
$databaseName = 'ukkperpus';
$databaseUsername = 'root';
$databasePassword = '';

global $conn;
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
    die(mysqli_error($conn));
}
