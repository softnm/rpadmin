<?php 
ob_start();
session_start();
if(!isset($_SESSION['user'])){
    
    
    header('Location: auth_login.php');
}
?>
<?php include "billet.php"; ?>
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

    <title><?php echo RP_NAME; ?></title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="lib/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="lib/datatable/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="lib/datatable/buttons.dataTables.css">
    <link rel="stylesheet" href="lib/datatable/select.bootstrap5.css">
    <link rel="stylesheet" href="../lib/prismjs/themes/prism.min.css">

    

    

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
  </head>
  <body>
<?php include "sidebar.php"; ?>
<?php include "topmenu.php"; ?>