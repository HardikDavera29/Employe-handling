<?php

  session_start();
  if(isset($_SESSION['admin_register'])||isset($_SESSION['admin_login'])) //* <-- If Admin LoggedIn Then Destroye All Sessions
  {
    session_unset();
    session_destroy();
    header("Location:index.php"); //* <-- After Hitting Conditions Redirect To The Home Page -->
  }

?>