<?php
$servername = "database.chsyluauj6zt.us-east-1.rds.amazonaws.com";
$username = "francis958";
$password = "12345678";
$dbname = "-";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user IP address and location using an API such as ipinfo.io
$ip = $_SERVER['REMOTE_ADDR'];
$location = file_get_contents("http://ipinfo.io/{$ip}/json");

// Insert user IP and location into the MySQL database
$sql = "INSERT INTO user_info (user_ip, user_location) VALUES ('$ip', '$location')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>