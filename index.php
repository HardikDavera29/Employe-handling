<?php
  require "config.php";
  session_start();
  $login = false;
  $ShowErr = true;
  $random="";
  $randomChar="";
  
  $chara = ['A','B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
          'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
          'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
          't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
  for($i = 0 ; $i < 7 ; $i++)
  {
    $randomChar .= $chara[ floor(rand(0,count($chara))) ];
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMPLOYE ADMIN | SIGN IN</title>
    <link rel="stylesheet" href="signin.css" />
    <link rel="stylesheet" href="boot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<?php
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    $userName = trim ( $_POST['Anm']);
    $captcha = $_POST['captcha'];
    $_SESSION['user'] = $userName;
    $pwd = $_POST['pwd'];
    $select = "SELECT * FROM `_emp1` WHERE `name`='$userName'";
    $RUN = mysqli_query($con, $select);
    if (!$RUN) die("Not working" . mysqli_error($con));
    
    if (mysqli_num_rows($RUN)==1) 
    { 
       while($row  = mysqli_fetch_array($RUN))
       {  

          //* Password validation
          if(password_verify($pwd, $row['password']))
          {

            //* validation of captcha
            if($captcha == $randomChar)
            {
              $login = true;
              $ShowErr = false;
              $_SESSION['login'] = $login;  //* session for cross checking in home.php 
              $_SESSION['toast'] = true; //* session For toastr in home.php
            }
            else
            {
            ?>
              <script>
                $(document).ready(function() {
                    toastr.options = {
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
                    //* show when page load
                    toastr.error('Invalid Captcha', 'SORRY !');
                });
              </script>
            <?php
            }
            //* Over the condition of captcha validation

          }
          else
          {
          ?>
            <script>
              $(document).ready(function() {
                  toastr.options = {
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
                  //* show when page load
                  toastr.error('Invalid password', 'SORRY !');
              });
            </script>
          <?php
          }
          //* over the password validations
           
       }
    } 
    else 
    {
      $ShowErr = false;
    }
  }
?>
<body>
    <div class="wrapper">
        <div class="title" title="sign in">SIGN IN</div>
        <form action="index.php" method="post">
            <div class="field">
                <input type="text" name="Anm" id="Anm" title="Enter Admin Name" required autofocus />
                <label for="Anm">Enter Admin Name</label>
            </div>
            <div class="field">
                <input type="password" name="pwd" id="pwd" minlength="6" maxlength="8" class="pass"
                    title="Enter password" required />
                <label for="pwd">Password</label>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="field">
                        <input type="text" id="preview" value="<?php echo $randomChar; ?>" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="field">
                        <input type="text" name="captcha" id="captcha" title="Enter Captcha" required />
                        <label for="captcha">Captcha</label>
                    </div>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="SIGN IN" class="check-btn" name="button" title="click now" />
            </div>
            <div class="signup-link" id="linkButton" title="Sign up now">
                Not a member? <a href="signup.php">Sign up now</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
      if($ShowErr == false)
      {
    ?>
    <script>
    $(document).ready(function() {
        toastr.options = {
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
        //* show when page load
        toastr.error('Invalid Credentials', 'OOPS!');
    });
    </script>
    <?php

     }
    ?>  
    <!-- //* CDN for toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" />
</body>

</html>