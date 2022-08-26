<?php

if (isset($_POST["submit"])) {

  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $remember = $_POST["remember"];

  if ($remember==1)
  {
      setcookie('uname',$username,time()+60*60*24*10,"/");
  }

  require_once 'db.php';
  require_once 'functions.php';

  if (emptyInputLogin($username, $pwd) !== false) {
    header ("location:../login.php?error=emptyInput");
    exit();
  }


  loginUser($conn,$username, $pwd );
?>

<?php

}
else {
  header ("location:../login.php");
  exit();
}
