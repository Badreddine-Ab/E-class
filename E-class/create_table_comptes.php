<?php

$servername = "localhost";
$username = "root";
$password = "Badr@2001";
$dbname = "e_classe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE comptes(
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 ima
 firstName VARCHAR(10) NOT NULL,
 lastName VARCHAR(10) NOT NULL,
 email VARCHAR(50) NOT NULL,
 password VARCHAR(10),
 Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table courses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close(); 