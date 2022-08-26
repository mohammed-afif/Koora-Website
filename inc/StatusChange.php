<?php
session_start();

if (isset($_SESSION["user_id"])) {
      $userid = $_SESSION["user_id"];

      if ($userid !== 4) {
        header ("location:index.php?error=notAllowed");
        exit();
      }
      require_once 'db.php';
      $userid = $_GET["id"];
      $sql = "SELECT user_status FROM users_table WHERE user_id = '$userid';";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $status =  $row["user_status"];
      if ($status) {
        $query_update = "UPDATE users_table SET user_status= '0' WHERE user_id=$userid";
      }
      else {
        $query_update = "UPDATE users_table SET user_status= '1' WHERE user_id=$userid";
      }
      $result_update = mysqli_query($conn, $query_update);

      header ("location:../users.php?error=Updated");
      exit();





    }
