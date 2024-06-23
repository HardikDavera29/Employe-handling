<?php 
   session_start();
   include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="boot.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
   <title>EMPLOYE ADMIN | HOME</title>
</head>
<body>

   <div class="header-text">
      <div class="text">
         <p>WelCome to <b>NexGen</b></p>
         <p class="subconten"> We provide a software for handle admin or back-end works , Gives sorting features or another and
            improve funcationality to manage your bulk amount of data</p>
      </div>
      <div class="imag">
         <img src="admin-removebg.png" class="admin" alt="adminImg" height="550" width="550">
      </div>
   </div>
   
   <?php 
      include "footer.php";  //* add footer from footer.php
      if($_SESSION['toast'] == true) //* session from index.php
      {
         ?>
         
         <script type="text/javascript">
            $(document).ready(function() {
            toastr.options={
               "closeButton": true,
               "debug": false,
               "newestOnTop": true,
               "preventDuplicates": true,
               "onclick": null,
               "showDuration": "100",
               "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "show",
               "hideMethod": "hide"
            }
            //* show when page load and sessions receive from index.php
            toastr.success('<?php if(isset($_SESSION['user'])) {echo $_SESSION['user'];} else { echo "Admin";} ?>' ,'Successfully Login!');
            });
         </script>

         <?php
        $_SESSION['toast'] = false; //* use to stop the toastr when user refresh page
      }
   ?>
<!-- //* CDN for toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css"/>

</body>
</html>