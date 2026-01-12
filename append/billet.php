<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
#database Configuration
define("hostname", "localhost");
define("username", "root");
define("password", "");
define("database",  "rpadmin");


$con=mysqli_connect(hostname,username,password,database);

if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


include "brisk/orm.php";

# Date Function

/* Define Default TImeZone From Application  */
date_default_timezone_set(getDateDefaultTimeZone());

/* Define Global Time  */
$time = date(getSettingsValues("2"));

/* Define Global Date */
$date = date(getSettingsValues("1"));


#Constant Rapid Admin Settings Global Values 

/* Name Of the Application */
define("RP_NAME",getSettingsValues("10"));

/* Icon / Favicon Define In WHole Application */
define("RP_ICON", getSettingsValues("11"));

/* Logo Define in WHole Application */
define("RP_LOGO", getSettingsValues("12"));

/* Copy Right Name */
define("RP_COPYRIGHT_SLANG", getSettingsValues("14"));

/* Copy Right Name */
define("RP_COPYRIGHT_YEAR", getSettingsValues("15"));

/* Copy Right Link */
define("RP_COPYRIGHT_LINK", getSettingsValues("16"));

/* Login Calling Method */
if(isset($_POST['login'])){

  $sql="SELECT `type` FROM `profile` WHERE `email`='".$_POST['username']."';";
  $type=$con->query($sql)->fetch_assoc()['type'];

  $data=login($_POST['username'],$_POST['password'],$type,$con);


}

/* Login Method */ 
function login( $email,$password,$type,$con){

  $sql="SELECT * FROM `profile` WHERE `type`='".$type."' AND `status`='1' AND `email`='".$email."';";
  $passtemp="";
  $tempId="";
  $result=$con->query($sql);
 
  while($row = $result->fetch_assoc()) {
    $passtemp=$row['password'];
    $tempId=$row['id'];
    
     
  }
  if($passtemp == $password){

    $_SESSION["user"]=$tempId;
    
    
    header('Location: index.php');

  }else{

     echo "<script>alert('Login Failed May be your information is incorrect or you can contact ".RP_NAME." ');</script>";

  }
}


/* Session User Details */

function userDetails($user){
   $details =  eq("SELECT * FROM `profile` WHERE `id`='".$user."';");
   return $details;
}




?>