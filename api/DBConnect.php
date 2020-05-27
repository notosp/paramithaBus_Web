<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_paramithabus";
 
$conn = new mysqli($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}