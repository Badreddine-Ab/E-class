<?php
    session_start();
  require_once('./library/library.php');
  destroy();
  
  redirect('./index');
  die();
?>
