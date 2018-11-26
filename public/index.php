<?php

//TEST PAGE
//-USED THIS PHP PAGE TO TEST SQL_FUNCTIONS.PHP

  require_once('../private/initialize.php');
?>

<?php

  $shoe_set = find_all_shoes();

?>

<?php 
  include(SHARED_PATH . '/public_header.php'); 
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="row mx-3">
      <?php while($shoe = mysqli_fetch_assoc($shoe_set)) { ?>
        <!-- <tr>
          <td><?php echo h($shoe['sneaker_name']); ?></td>
          <td><?php echo h($shoe['brand_name']); ?></td>
          <td><?php echo h($shoe['release_date']); ?></td>
    	    <td><?php echo h($shoe['image']); ?></td>
          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'"/>'; ?></td>
          <td><?php echo h($shoe['price']); ?></td>
    	  </tr> -->
      <div class="col-4 my-3">
        <div class="card text-center px-4" style="width: 15rem;">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'" class="card-img-top"/>'; ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo h($shoe['sneaker_name']); ?></h5>
            <h6 class="card-subtitle text-muted"><?php echo h($shoe['brand_name']); ?></p>
            <a href="./details.php?id=<?php echo urlencode($shoe['sneaker_id']); ?>&name=<?php echo urlencode($shoe['sneaker_name']); ?>" class="card-link">Details</a>
          </div>
        </div>
      </div>
      <?php } ?>
</div>

<?php
      mysqli_free_result($shoe_set);
?>

<?php include(SHARED_PATH . '/public_footer.php');
