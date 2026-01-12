
<?php 
ob_start();
session_start();
       if(isset($_SESSION['user'])){
          header('Location: index.php');
       }
?>


<?php include "append/billet.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="<?php echo RP_NAME; ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo RP_ICON; ?>">

    <title>Log In / Sign In | <?php echo RP_NAME; ?></title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="lib/remixicon/fonts/remixicon.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
  </head>
  <body class="page-sign d-block py-0">
  
    <div class="row g-0">
      <div class="col-md-7 col-lg-5 col-xl-4 col-wrapper">
        <div class="card card-sign">
          <div class="card-header">
            <a href="" class="header-logo mb-5"><img src="<?php echo RP_LOGO; ?>" style="width: 300px;" /></a>
            <h3 class="card-title">Log In / Sign In</h3>
            <p class="card-text">- Softlabx</p>
          </div><!-- card-header -->
          <form method="POST" >
          <div class="card-body">
            <div class="mb-4">
              <label class="form-label">Email address</label>
              <input type="text" name="username" class="form-control" placeholder="Enter your Username / Email address">
            </div>
            <div class="mb-4">
              <label class="form-label d-flex justify-content-between">Password <a href="forgot-password.php">Forgot password?</a></label>
              <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <button class="btn btn-primary btn-sign" type="submit" name="login">Sign In</button>

            <!-- <div class="divider"><span>or sign in with</span></div> -->

            <!-- <div class="row gx-2">
              <div class="col"><button class="btn btn-facebook"><i class="ri-facebook-fill"></i> Facebook</button></div>
              <div class="col"><button class="btn btn-google"><i class="ri-google-fill"></i> Google</button></div>
            </div> -->
          </div><!-- card-body -->
          </form>
          <div class="card-footer">
            Don't have an account? <a href="sign-up.php">Create an Account</a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col -->
      <div class="col d-none d-lg-block"><img src="assets/img/cover.jpg" class="auth-img" alt=""></div>
    </div><!-- row -->
  
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      'use script'

      var skinMode = localStorage.getItem('skin-mode');
      if(skinMode) {
        $('html').attr('data-skin', 'dark');
      }
    </script>
  </body>
</html>
