<?php
  include_once 'header.php';
 ?>


  <section class="login-form">
 <h1>Login</h1>

 <form action="inc/login.inc.php" method="post">

   <input type="text" name="username" placeholder="Username/Email..." value="<?php if (isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>">
   <input type="password" name="pwd" placeholder="Password...">
   <label class="form-check-label text-muted">
     <input type="checkbox" name="remember" value="1" class="form-check-input">
     Keep me signed in
   </label>
   <button type="submit" name="submit">Login</button>
 </form>
 <?php
 if (isset($_GET["error"])) {
   if ($_GET["error"] == "emptyInput") {
     echo "<p>Fill in the fields</p>";
   }
   else if ($_GET["error"] == "userNotexist") {
     echo "<p>User name not exist</p>";
   }
   else if ($_GET["error"] == "wrongPwd") {
     echo "<p>Wrong password!!</p>";
   }
   else if ($_GET["error"] == "supsendAccount") {
     echo "<p>Your account is supssended</p>";
   }
 }
  ?>


  </section>

 <?php
   include_once 'footer.php';
  ?>
