<?php
include_once 'header.php';
?>
<?php
if (isset($_GET["success"])) {

  ?>

  <script>
  setTimeout(function(){
    window.location.href = 'index.php';
  }, 6500);

  </script>
  <div class="container w-50 border border-dark my-5 px-5 py-4 bg-info bg-gradient">
    <div class="row d-flex justify-content-center pb-4">
      <h2 class="display-4">Welcome USER</h2>
    </div>
    <p>Hello<br><br>

      You registered an account on YEMEN SHOP, before being able to use your account you need to verify that this is your email address .


      <br><br>Kind Regards, YEMEN SHOP</p>

      <div class="row d-flex justify-content-end">
        <p>  <br>
          Please click <a class="text-white" href="index.php ">here</a> if you are not redirected within a few seconds</p>
        </div>
      </div>


      <?php
    }
    else {
      header ("location:index.php");}
      ?>
      <?php
      include_once 'footer.php';
      ?>
