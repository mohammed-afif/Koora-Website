<?php
function emptyInputSignup($name, $username, $email, $pwd, $repwd){
  $result;
  if (empty($name) || empty($username) || empty($email) || empty($pwd) || empty($repwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUsername($username){
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $repwd){
  $result;
  if ($pwd !== $repwd) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function userExist($conn, $username , $email){
  $sql = "SELECT * FROM users_table WHERE username = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt ,$sql)) {
    header ("location:../signup.php?error=stmtFaield");
    exit();
  }

  mysqli_stmt_bind_param($stmt , "ss" , $username , $email);
  mysqli_stmt_execute($stmt);


  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}




function usernameExist($conn, $username){
  $sql = "SELECT * FROM users_table WHERE username = ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt ,$sql)) {
    header ("location:../signup.php?error=stmtFaield");
    exit();
  }

  mysqli_stmt_bind_param($stmt , "s" , $username);
  mysqli_stmt_execute($stmt);


  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}


function emailExist($conn, $email){
  $sql = "SELECT * FROM users_table WHERE email = ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt ,$sql)) {
    header ("location:../signup.php?error=stmtFaield");
    exit();
  }

  mysqli_stmt_bind_param($stmt , "s" , $email);
  mysqli_stmt_execute($stmt);


  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}




function createUser($conn, $name, $username, $email, $pwd ,$gender){
  $hashedPwd = password_hash($pwd , PASSWORD_DEFAULT);
  $sql = "INSERT INTO users_table (full_name, username, email, password , gender) VALUES ('$name' , '$username' , '$email' , '$hashedPwd' , '$gender');";
  $qry= mysqli_query($conn,$sql) ;//or die("Error in inserting Data");


  header ("location:../welcome.php?success");
  exit();
}




















function emptyInputLogin($username,$pwd){
  $result;
  if (empty($username) ||empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd){
$usernameExist = userExist($conn, $username , $username);

if ($usernameExist === false) {
  header ("location:../login.php?error=userNotexist");
  exit();
}
$hashedPwd = $usernameExist["password"];
$checkPwd = password_verify($pwd, $hashedPwd);

if ($checkPwd === false) {
  header ("location:../login.php?error=wrongPwd");
  exit();
}
else if ($checkPwd === true){

$status = $usernameExist["user_status"];
if ($status) {
  session_start();
  $_SESSION["user_id"] =  $usernameExist["user_id"];
  $_SESSION["username"] =  $usernameExist["username"];
  header ("location:../index.php");
  exit();
}
else {
  header ("location:../login.php?error=supsendAccount");
  exit();
}




}
}





function emptyInputProfile($newname, $newusername, $newemail,$newgender,$newbirthdate){
  $result;
  if (empty($newusername) ||empty($newname) || empty($newemail) || empty($newgender) || empty($newbirthdate))
  {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
