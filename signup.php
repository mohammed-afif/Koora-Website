<?php
  include_once 'header.php';
 ?>

 <section class="signup-form">
<h1>Sign up</h1>

<form action="inc/signup.inc.php" method="post">

  <input type="text" name="name" placeholder="Full name...">
  <input type="text" name="username" placeholder="Username...">
  <input type="text" name="userEmail" placeholder="Email...">
  <input type="date" name="birthdate">






  <input type="text" name="gender" placeholder="Gender...">
  <input type="password" name="pwd" placeholder="Password...">
  <input type="password" name="repwd" placeholder="Repeat passwrod...">
  <button type="submit" name="submit">Sign up</button>
</form>
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyInput") {
    echo "<p>Fill in the fields</p>";
  }
  else if ($_GET["error"] == "invalidUsername") {
    echo "<p>Incorrect username</p>";
  }
  else if ($_GET["error"] == "invalidEmail") {
    echo "<p>Incorrect Email</p>";
  }
  else if ($_GET["error"] == "pwdNotmatch") {
    echo "<p>Passwords does not match</p>";
  }
  else if ($_GET["error"] == "usernameTaken") {
    echo "<p>User name is already taken</p>";
  }
  else if ($_GET["error"] == "stmtFaield") {
    echo "<p>Something went wrong</p>";
  }
}
 ?>
</section>




 <?php
   include_once 'footer.php';
  ?>
