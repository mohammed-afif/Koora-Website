<?php
session_start();



if (isset($_SESSION["user_id"])){
  if ($_SESSION["user_id"] !== 4) {
    header ("location:../index.php?error=notAllowed");
    exit();
    }

    else {


      $userid = $_GET["id"];
      $newname = $_POST["name"];
      $newusername = $_POST["username"];
      $newemail = $_POST["userEmail"];
      $newgender =  $_POST["gender"];
      $newbirthdate =  $_POST["birthdate"];


      require_once 'db.php';
      require_once 'functions.php';

      if (emptyInputProfile($newname, $newusername, $newemail,$newgender,$newbirthdate) !== false) {
        header ("location:../editUser.php?id=$userid");
        exit();
      }

      $sql = "SELECT * FROM users_table WHERE user_id = '$userid';";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      $oldName = $row['full_name'];
      $oldUsername = $row['username'];
      $oldEmail = $row['email'];
      $oldgender = $row['gender'];
      $oldbirthdate = $row['birth_date'];



      if($oldUsername === $newusername && $oldEmail === $newemail && $oldName === $newname && $newbirthdate == $oldbirthdate && $newgender == $oldgender ){
        header ("location:../editUser.php?noChanges");
        exit();
      }

      else {
        if ($newusername !== $oldUsername){
          if (usernameExist($conn, $newusername) !== false) {
            header ("location:../editUser.php?error=usernameTaken");
            exit();
          }
          if (invalidUsername($newusername) !== false) {
            header ("location:../editUser.php?error=invalidUsername");
            exit();
          }
        }
        if($newemail !== $oldEmail){
          if (emailExist($conn, $newemail) !== false) {
            header ("location:../editUser.php?error=emailIstoken");
            exit();
          }
          if (invalidEmail($newemail) !== false) {
            header ("location:../editUser.php?error=invalidEmail");
            exit();
          }
        }
      }

      $capitalName = ucfirst($newname);
      $query_update = "UPDATE users_table SET username='$newusername', full_name='$capitalName', email='$newemail' , gender = '$newgender' , birth_date = '$newbirthdate' WHERE user_id=$userid";
      $result_update = mysqli_query($conn, $query_update);

      header ("location:../editUser.php?error=Updated");


    }













}









else {
  header ("location:../index.php?error=notAllowed");
  exit();

}
