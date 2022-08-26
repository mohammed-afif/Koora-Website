<?php
  include_once 'header.php';
 ?>


<?php
if (isset($_SESSION["user_id"])) {
      $userid = $_SESSION["user_id"];
      $sql = "SELECT * FROM users_table WHERE user_id = '$userid';";
      require_once 'inc/db.php';
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      $name = $row["full_name"];
      $email = $row["email"];
      $birthdate = $row["birth_date"];
      $username = $row["username"];
      $gender = $row["gender"];
      $userimage = $row["user_image"];
}
else{
  header ("location:index.php");
  exit();
}
?>



<div class="container rounded bg-white mt-5 mb-4">
    <div class="row">
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5 "><img class="rounded-circle mt-0" style="max-width: 300px;" src="images\<?php echo $userimage ?>"><span> </span></div>
        </div>
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form class="" action="inc/profile.inc.php?id=<?php echo $userid ?>" method="post">
                  <div class="row mt-3">
                      <div class="col-md-6"><label class="labels">User name</label><input type="text" name="username" class="form-control" placeholder="Full name" value="<?php echo $username; ?>"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo $name; ?>"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="userEmail" class="form-control" placeholder="Email" value="<?php echo $email; ?>"></div>
                      <div class="col-md-12"><label class="labels">Birth date</label><input type="date" name="birthdate" class="form-control" placeholder="education" value="<?php echo $birthdate; ?>"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-6"><label class="labels">Gender</label><input type="text" name="gender" class="form-control" placeholder="" value="<?php echo $gender ?>"></div>
                  </div>

                  <div class="mt-5 d-flex justify-content-center"><h4 class="text-danger">
                    <?php
                    if (isset($_GET["error"])) {
                      if ($_GET["error"] == "emptyInput") {
                        echo "Fill in the fields";
                      }
                      else if ($_GET["error"] == "usernameTaken") {
                        echo "User name already used";
                      }
                      else if ($_GET["error"] == "invalidUsername") {
                        echo "Invalid user name";
                      }
                      else if ($_GET["error"] == "emailIstoken") {
                        echo "Email is already used";
                      }
                      else if ($_GET["error"] == "invalidEmail") {
                        echo "Invalid email";
                      }
                      else if ($_GET["error"] == "Updated") {
                        echo "Successful update !";
                      }
                    }
                     ?>



                  </h4></div>

                  <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit" type="submit">Save Profile</button></div>

                </form>
                </div>

        </div>
    </div>
</div>
</div>
</div>

<?php
    include_once 'footer.php';
?>
