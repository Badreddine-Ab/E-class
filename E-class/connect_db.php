<?php

$servername = "localhost";
$username = "root";
$password = "Badr@2001";
$db = "e_classe_db" ;
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
// ?>