 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="nav1.css">
     <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <title>EMPLOYE ADMIN | NAVBAR</title>
 </head>
 <?php
    include "config.php";
    if (isset($_SESSION['login']))  $Adname = $_SESSION['user'];
    else header("location:index.php");
    $select12 = "SELECT * FROM _emp1 where `name` = '$Adname'";
    $rUn = mysqli_query($con, $select12);
    $rows = mysqli_fetch_assoc($rUn);
    $contact = $rows['contact'];
    $email1 = $rows['email'];
 ?>

 <body>
     <!--//* start modal  -->
     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class=" modal-title fs-5 text-success" id="editModal">Admin Information</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="dialog modal-body container">
                     <!--//*start modal form -->
                     <form method="post" action="nav.php" class="form p-3 fw-semibold">

                         <label for="AdName" class="text-dark"> Admin Name :</label>
                         <input type="text" name="AdName" value="<?php echo $Adname; ?>" class=" nav-inp form-control"
                             id="AdName" disabled>

                         <label for="CONTACT" class="mt-3 text-dark"> Contact Number</label>
                         <input type="text" name="CONTACT" maxlength="10" minlength="10" value="<?php echo $contact; ?>"
                             class="nav-inp form-control mt-1" id="CONTACT" disabled>

                         <label for="mail" class="mt-3 text-dark"> E-Mail :</label>
                         <input type="text" name="mail" class="nav-inp form-control" value="<?php echo $email1; ?>"
                             id="mail" disabled>

                         <button class=" ButtoN btn btn-danger btn-outline-danger mt-3 text-light"><a href="logout.php"
                                 class="nav-link">Logout</a></button>
                         <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                     </form>
                     <!-- //*End of modal form-->
                 </div>
             </div>
         </div>
     </div>
     <!-- //* End of modal -->

     <!-- //* navbar start  -->
     <nav class="nav-head sticky-top py-2 shadow-sm rounded navbar navbar-expand-lg w-100">
         <div class=" container-fluid w-100">
             <a class="txt navbar-brand fw-semibold" href="home.php">NexGen</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link linkU" href="home.php" aria-current="page">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link linkU" href="registration.php" aria-current="page">Registration</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link linkU" href="employe.php" aria-current="page">Employes Detail</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link linkU" href="about.php" aria-current="page">About</a>
                     </li>
                 </ul>
                 <div class="user-profile">
                     <div class="users name">
                         <span><?php echo $_SESSION['user']; ?> </span>
                         <span>Admin</span>
                     </div>
                     <div>
                         <i class=" users fa-sharp fa-solid fa-circle-user fa-2xl" style="color: #7e22ce;"></i>
                     </div>
                 </div>
             </div>
         </div>
     </nav>
     <!-- //*navbar end -->


     <!--//* scripts and CDNs for jqueryies and other  -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
     </script>
     <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
     <script>
     users = document.getElementsByClassName('users');
     Array.from(users).forEach((e) => {
         e.addEventListener("click", (h) => {
             $("#editModal").modal("toggle");
         });
     });
     </script>

 </body>

 </html>