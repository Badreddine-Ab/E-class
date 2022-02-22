<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE courses(
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 Image VARCHAR(50) NOT NULL,
 Title VARCHAR(20) NOT NULL,
 Discription VARCHAR(100) NOT NULL,
 Price int(6),
 Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table courses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close(); 