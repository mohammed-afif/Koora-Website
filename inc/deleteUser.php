<?php
session_start();
if (isset($_SESSION["user_id"])){
  $userid = $_SESSION["user_id"];
  if ($userid !== 4) {
    header ("location:../index.php?error=notAllowed");
    exit();
  }
  include 'db.php';
  $id = $_GET['id'];
  $sql = "SELECT username FROM users_table WHERE user_id = $id;";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);
  $user = $row['username'];

  if ($id === 4) {
    header ("location:../users.php?action=cantDelete");
    exit();
  }
  else {
    $query = "DELETE FROM users_table WHERE user_id=$id";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header ("location:../users.php?action=delete");
  }



}
else {
  header ("location:../index.php?error=notAble");
}
