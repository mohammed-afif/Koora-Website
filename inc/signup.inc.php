<?php

if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["userEmail"];
  $gender = $_POST["gender"];
  $pwd = $_POST["pwd"];
  $repwd = $_POST["repwd"];

  require_once 'db.php';
  require_once 'functions.php';

  if (emptyInputLogin($name, $username, $email, $pwd, $repwd) !== false) {
    header ("location:../signup.php?error=emptyInput");
    exit();
  }
  if (invalidUsername($username) !== false) {
    header ("location:../signup.php?error=invalidUsername");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header ("location:../signup.php?error=invalidEmail");
    exit();
  }
  if (pwdMatch($pwd, $repwd) !== false) {
    header ("location:../signup.php?error=pwdNotmatch");
    exit();
  }
  if (userExist($conn, $username,$email) !== false) {
    header ("location:../signup.php?error=usernameTaken");
    exit();
  }

  createUser($conn, $name, $username, $email, $pwd , $gender);

  }
else {
  header ("location:../signup.php");
}
