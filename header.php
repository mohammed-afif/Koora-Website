<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>YEMEN KOOORA</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <link href="css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
  <script src="js/js.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">




</head>
<body>

<div class="d-flex px-5 mx-5 bg-light justify-content-between align-items-center">
  <div class="border-right">
    <a class="navbar-brand " href="index.php">YEMEN KOOORA <i class="fas fa-futbol"></i></a>
  </div>
  <div>
    <ul class="d-flex nav">
      <li class="px-3 nav-item "><a href='index.php'><i class="fas fa-home"></i>  Home</a></li>

      <?php
      if (isset($_SESSION["user_id"])) {
        $userid = $_SESSION["user_id"];
        $sql = "SELECT * FROM users_table WHERE user_id = '$userid';";
        require_once 'inc/db.php';
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $name = $row['full_name'];
        $img = $row['user_image'];
        if ($userid === 4) {
          ?>
          <li class="px-3 nav-item "><a href='users.php'><i class="fas fa-users-cog"></i>  Users dashboard</a></li>
          <li class="px-3 nav-item "><a href='index.php'><i class="far fa-calendar-alt"></i>  Events dashboard</a></li>
          <?php
        }
        ?>
        <li class="px-3 nav-item "><a href='profile.php'><i class="far fa-user-circle"></i>  Profile</a></li>
        <li class="px-3 nav-item "><a href='inc/logout.inc.php'><i class="fas fa-sign-out-alt"></i>  Log out</a></li>
        <?php
      }
      else {
        ?>
        <li class="px-3 nav-item "><a href='signup.php'><i class="fas fa-user-plus"></i>  Sign up</a></li>
        <li class="px-3 nav-item "><a href='login.php'><i class="fas fa-sign-in-alt"></i>  Login</a></li>
        <?php
      }
      ?>
    </ul>
</div>
<?php
  if (isset($_SESSION["user_id"])) {
    ?>
    <div class="col-3 d-flex align-items-center justify-content-center border-left">
      <span class="mr-3"><?php echo ucfirst($name) ?></span>
        <img class="rounded-circle" style="max-width: 50px;" src="images\<?php echo $img ?>" alt="">
    </div>

    <?php
  }
  else {
    ?>
    <span class="col-3"></span>
    <?php
  }
  ?>

</div>
