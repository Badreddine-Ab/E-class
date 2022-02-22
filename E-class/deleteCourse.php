<?php
  session_start();
  require_once 'connect_db.php';
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `courses` WHERE id = $id");
    header('location: Dashbord_Courses.php');
  }
?>