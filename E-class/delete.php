<?php
  
  require_once 'connect_db.php';
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id = $id");
    header('location: Dashbord_Student.php');
  }
?>
