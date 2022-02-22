<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


$sql = "CREATE TABLE payment_details (
name VARCHAR(20) NOT NULL,
Payment_Schedule VARCHAR(10) NOT NULL,
Bill_Number int(10) NOT NULL,
Amount_Paid VARCHAR(20),
Balance_amount VARCHAR(20),
Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table students created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
