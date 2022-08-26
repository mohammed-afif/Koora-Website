<script>

   var today = new Date().toLocaleDateString(undefined, {
   month: '2-digit',
   day: '2-digit',
   year: 'numeric'
})
  document.cookie = "myTime="+today+"";
</script>
<?php
  include_once 'header.php';
  $sql;
  if (isset($_COOKIE['myTime'])) {
    $todayDate = $_COOKIE['myTime'];
    $sql = "SELECT * FROM events_table WHERE event_date = '$todayDate';";
  }
  else {
      $sql = "SELECT * FROM events_table;";
  }


  require_once 'inc/db.php';
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);


  if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    if($id == 4){
      $userAdmin= true;
    }
    else {
      $userAdmin= false;    }
  }
  else {
      $userAdmin= false;
  }
 ?>

 <script>

    var today = new Date().toLocaleDateString(undefined, {
    month: '2-digit',
    day: '2-digit',
    year: 'numeric'
 })
   document.cookie = "myTime="+today+"";


 </script>

<div class="container mt-5 border mb-5" style="max-width:900px; height: 55px;" >
  <div class="row d-flex justify-content-between align-items-stretch h-100">

    <div class="d-flex justify-content-center col " style="background-color: #00008B;">
      <a class="d-flex justify-content-center w-100 m-auto text-light" href="#">Yesterday</a>
    </div>
    <div class="d-flex justify-content-center col mx-1" style="  background-color: #B22222;">
        <a class="d-flex justify-content-center w-100 m-auto text-light" href="#">Today</a>
    </div>
    <div class="d-flex justify-content-center col " style="background-color: #2F4F4F;">
          <a class="d-flex justify-content-center w-100 m-auto text-light" href="#">Tomorrow</a>
    </div>
  </div>
  <div class="row my-1 d-flex justify-content-center">
    <h6 class="pr-2">Today's most important events </h6>
    <h6 id="time"> </h6>
    <script>
    var today = new Date().toLocaleDateString(undefined, {
    month: '2-digit',
    day: '2-digit',
    year: 'numeric'
    })
     document.getElementById("time").innerHTML = today ;
    </script>
  </div>
</div>





















<div class="container border border-dark mt-4 match" style="max-width:900px;">


<div class="row">
  <div class="col">
    <div class="row my-2 mx-5 d-flex justify-content-center border-bottom pb-3 pt-2" >
      <div class="py-2 mr-5 col">
        <div class="row d-flex justify-content-end">
          <span class="pr-4">BARCELONA</span>
        </div>
      </div>

      <div class="px-2 py-2 text-light rounded col-2 text-center" id = "time_box" style="background-color: #191970;">
        <span>Going now</span>
        <i class="far fa-clock"></i>
      </div>

      <div class="py-2 ml-5 col">
        <div class="row d-flex justify-content-start">

          <span class="pl-4">MANCHESTER UNITED</span>
        </div>
      </div>
  </div>


  <div class="card-group border-0 ">
    <div class="card border-0 text-center">
      <div class="card-body">
        <h6 class="card-title"><i class="material-icons">emoji_events</i></h6>
        <p class="card-text text-muted">La Liga</p>
      </div>
    </div>
    <div class="card border-0 text-center">
      <div class="card-body">
        <h6 class="card-title"><i class="material-icons">tv</i></h6>
        <p class="card-text text-muted">CBS Sport 3 (English)</p>
      </div>
    </div>
    <div class="card border-0 text-center ">
      <div class="card-body">
        <h6 class="card-title"><i class="material-icons">mic</i></h6>
        <p class="card-text text-muted">Martin Tyler</p>
      </div>
    </div>
    <div class="card border-0 text-center ">
      <div class="card-body">
            <h6 class="card-title"><i class="material-icons">stadium</i></h6>
        <p class="card-text text-muted">Camp nuo</p>
      </div>
    </div>
  </div>

  </div>
  <?php
      if ($userAdmin){
        ?>
        <div class="col-1 border-left d-flex text-center mt-4 mb-4 justify-content-around" style="flex-direction: column;">
          <div class="pb-4">
            <a href="#"><i class="fas fa-play" style="font-size: 20px; color:green;"></i></a>
          </div>
          <div class="pb-4">
            <a href="#"><i class="far fa-edit" style="font-size: 20px;"></i></a>
          </div>
          <div class="">
            <a href="#"><i class="far fa-trash-alt" style="font-size: 20px; color:red;"></i></a>
          </div>
        </div>
        <?php
      }
   ?>
</div>



</div>





























<?php
if ($count != 0) {
    while ($row = mysqli_fetch_assoc($result)):
        ?>









        <div class="container border border-dark mt-4" style="max-width:900px;">

          <div class="row">
            <div class="col">
              <div class="row my-2 mx-5 d-flex justify-content-center border-bottom pb-3 pt-2" >
                <div class="py-2 mr-5 col">
                  <div class="row d-flex justify-content-end">
                      <span class="pr-4 text-uppercase"><?php echo $row['frst_team_name']; ?></span>
                      <?php
                          if (isset($_SESSION["user_id"])) {
                            if ($id == 4){
                              ?>
                              <div class="">
                                <a href="#"><i class="fas fa-plus pr-1" style="color: green;"></i></a>
                                <a href="#"><i class="fas fa-minus pl-1" style="color: red;"></i></a>
                              </div>
                              <?php
                            }
                            else {
                              ?>
                              <div class="">
                                <span class=""><?php echo $row['frst_team_result']; ?></span>
                              </div>
                              <?php
                            }
                          }
                          else {
                            ?>
                            <div class="">
                              <span class=""><?php echo $row['frst_team_result']; ?></span>
                            </div>
                            <?php
                          }
                       ?>
                  </div>

                </div>
                <div class="px-2 py-2 text-light rounded col-2 text-center" id = "time_box" style="background-color: #191970;">
                  <span>
                <?php
                if ($row['event_status'] == 0) {
                  echo $row['event_time'];
                }
                else if ($row['event_status'] == 1) {
                  ?>
                  <span><?php echo $row['frst_team_result']; ?></span>
                  <span class="px-2">-</span>
                  <span><?php echo $row['scnd_team_result']; ?></span>

                  <?php
                }
                else if ($row['event_status'] == 2) {
                  echo "Done";
                }
                else {
                  echo $row['event_time'];
                }
                ?>
                  </span>

                  <?php
                  if ($row['event_status'] == 0) {
                    ?>
                    <i class="far fa-clock"></i>
                    <?php
                  }
                  else if ($row['event_status'] == 1) {
                    ?>
                    <?php
                  }
                  else if ($row['event_status'] == 2) {
                    ?>
                    <i class="far fa-clock"></i>
                    <?php
                  }
                  else {
                    ?>
                    <i class="far fa-clock"></i>
                    <?php
                  }
                  ?>


                </div>
                <div class="py-2 ml-5 col">
                  <div class="row d-flex justify-content-start">
                    <?php
                        if (isset($_SESSION["user_id"])) {
                          if ($id == 4){
                            ?>
                            <div class="">
                              <a href="#"><i class="fas fa-plus pr-1" style="color: green;"></i></a>
                              <a href="#"><i class="fas fa-minus pl-1" style="color: red;"></i></a>
                            </div>
                            <?php
                          }
                          else {
                            ?>
                            <div class="">
                              <span class=""><?php echo $row['scnd_team_result']; ?></span>
                            </div>
                            <?php
                          }
                        }
                        else {
                          ?>
                          <div class="">
                            <span class=""><?php echo $row['scnd_team_result']; ?></span>
                          </div>
                          <?php
                        }
                     ?>
                    <span class="pl-4 text-uppercase"><?php echo $row['scnd_team_name']; ?></span>
                  </div>
                </div>
            </div>
            <div class="card-group border-0 ">
              <div class="card border-0 text-center">
                <div class="card-body">
                  <h6 class="card-title"><i class="material-icons">emoji_events</i></h6>
                  <p class="card-text text-muted"><?php echo $row['event_comp']; ?></p>
                </div>
              </div>
              <div class="card border-0 text-center">
                <div class="card-body">
                  <h6 class="card-title"><i class="material-icons">tv</i></h6>
                  <p class="card-text text-muted"><?php echo $row['event_channel']; ?></p>
                </div>
              </div>
              <div class="card border-0 text-center ">
                <div class="card-body">
                  <h6 class="card-title"><i class="material-icons">mic</i></h6>
                  <p class="card-text text-muted"><?php echo $row['event_com']; ?></p>
                </div>
              </div>
              <div class="card border-0 text-center ">
                <div class="card-body">
                      <h6 class="card-title"><i class="material-icons">stadium</i></h6>
                  <p class="card-text text-muted"><?php echo $row['event_place']; ?></p>
                </div>
              </div>
            </div>



            </div>
            <?php
                if ($userAdmin) {
                  ?>
                  <div class="col-1 border-left d-flex text-center mt-4 mb-4 justify-content-around" style="flex-direction: column;">
                    <div class="pb-4">
                      <a href="#"><i class="fas fa-play" style="font-size: 20px; color:green;"></i></a>
                    </div>
                    <div class="pb-4">
                      <a href="#"><i class="far fa-edit" style="font-size: 20px;"></i></a>
                    </div>
                    <div class="">
                      <a href="#"><i class="far fa-trash-alt" style="font-size: 20px; color:red;"></i></a>
                    </div>
                  </div>
                  <?php
                }
             ?>
          </div>







        </div>
















        <?php

    endwhile;
} else {
    ?>
    <div class="container m-auto text-center">
      <h5 class="text-danger">NO IMPORTANT EVENTS TODAY</h5>
    </div>


    <?php
}





?>
















 <?php
   include_once 'footer.php';
  ?>
