<?php

$servername = "nfl2021.czk72giofwz3.us-east-1.rds.amazonaws.com";
$username = "Capstone";
$password = "#Pt759266";
$database = 'NFL2021';
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
