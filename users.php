<?php
  include_once 'header.php';
 ?>


 <?php
 if (isset($_SESSION["user_id"])) {
       $userid = $_SESSION["user_id"];

       if ($userid !== 4) {
         header ("location:index.php?error=notAllowed");
         exit();
       }
       else {
         $sql = "SELECT * FROM users_table;";
         require_once 'inc/db.php';
         $result = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($result);
         $row = mysqli_fetch_assoc($result);

         $i = 1;

       }
?>
<div class="container border pt-5 mb-5">
  <section>

<div class="row pb-4">
  <h2 class="mx-auto">USERS</h2>

</div>
<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] == "delete") {
   ?>
   <div class="row" id="deleteMsg">
     <h4 class="mx-auto">Deleted success</h4>
     <script>
       fade_out();
     </script>
   </div>
   <?php
   }
   else if ($_GET['action'] == "cantDelete")
   {
     ?>
     <div class="row" id = "cantDlt">
       <h4 class="mx-auto">Can not delete the Admin user</h4>
       <script>
         fade_outt();
       </script>
     </div>
     <?php
   }
}
else {
  ?>
  <div class="row">
    <h4 class="mx-auto" style="visibility: hidden"> ...</h4>
  </div>
  <?php
}
 ?>
      <table class="table table-striped table-hover table-bordered " style="border-collapse:collapse ;text-align:center">
          <thead class="thead-dark">
              <tr>
                  <th>No.</th>
                  <th>Full name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>BirthDate</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              <?php
              if ($count != 0) {
                  while ($row = mysqli_fetch_assoc($result)):
                      ?>
                      <tr>
                          <th scope="row"><?php echo $i; ?></td>
                          <td><?php echo $row['full_name']; ?></td>
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['birth_date']; ?></td>
                          <td ><?php echo $row['gender']; ?></td>
                          <td ><?php
                          if ($row['user_status']){
                            ?>
                            <a href="inc/StatusChange.php?id=<?php echo $row['user_id']; ?>"><i class="far fa-check-circle" style="font-size:20px; color:green"></i></a>                            
                            <?php
                          }
                          else {
                            ?>
                            <a href="inc/StatusChange.php?id=<?php echo $row['user_id']; ?>"><i class="far fa-times-circle" style="font-size:20px; color:red"></i></a>
                            <?php
                          }
                          ?></td>
                          <td class="d-flex justify-content-around">
                            <a href='editUser.php?id=<?php echo $row['user_id']; ?>'><i class="fas fa-user-edit"></i></a>
                            <a href='inc/deleteUser.php?id=<?php echo $row['user_id']; ?>'><i class="fas fa-user-slash"></i></a>
                          </td>
                      </tr>
                      <?php
                      $i++;
                  endwhile;
              } else {
                  ?>
                  <tr>
                      <td colspan="5" style="text-align: center; color: #f00">Data not found</td>
                  </tr>
                  <?php
              }
              ?>
          </tbody>
      </table>
  </section>
</div>


<?php

 }
 else{
   header ("location:index.php");
 }
 ?>

<?php
  include_once 'footer.php';
 ?>
