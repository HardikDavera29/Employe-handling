<?php
  session_start();
  if(isset($_SESSION['login']))
  {
    session_unset();
    session_destroy();
  }
  header("Location:index.php"); //* check for user login or not from index.php after logout works

?>