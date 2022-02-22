<?php
    
  
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];


    header('location:Dashboard_Admin.php')
?>