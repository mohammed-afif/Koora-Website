
<h3 class="item">Welcome to YEMEN SHOP</h3>


<?php
$sql = "SELECT * FROM items_table;";
require_once 'inc/db.php';
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>


            <?php
            if ($count != 0) {
                while ($row = mysqli_fetch_assoc($result)):
                    ?>

                    <div class="container-md border">
                      <div class="row align-items-start">
                        <div class="col">
                          <div><?php echo $row['item_image'];?> </div>
                          <div><?php echo $row['item_name'];?> </div>
                          <div><?php echo $row['item_price'].'$';?> </div>
                          </div>
                      </div>
                    </div>

                    <?php
                endwhile;
            } else {

            }
            ?>
</section>
