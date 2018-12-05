<?php
  require_once('../private/initialize.php');
  no_SSL();

?>

<?php

  $shoe_set = find_all_shoes();

?>

<?php
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="container">
  <div class="row my-3 justify-content-end">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        sort by
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Newest First</a>
        <a class="dropdown-item" href="#">Most Popular</a>
        <a class="dropdown-item" href="#">Price</a>
      </div>
    </div>
  </div>
  <div class="row mb-5">
      <?php while($shoe = mysqli_fetch_assoc($shoe_set)) { ?>
        <div class="col-3 my-3">
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
</div>

<?php
      mysqli_free_result($shoe_set);
?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
