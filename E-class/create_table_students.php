<?php

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
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(20) NOT NULL,
email VARCHAR(7) NOT NULL,
phone VARCHAR(15) NOT NULL,
EnrollNumber VARCHAR(20),
Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table students created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

?>