<!--php page shows all sneakers in database-->

<?php
  require_once('../private/initialize.php');
  no_SSL();

?>

<?php
  //query to database to retrieve all sneakers
  $shoe_set = find_all_shoes();

?>

<?php
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="container">
  <div class="row my-3 justify-content-end">
    <form>
      <div class="form-group">
        <label for="sort-by">Sort By</label>
        <select id="sort-by" class="form-control" onchange="sortBy(this.value)">
          <option value="newest">Newest</option>
          <option value="most-popular">Most Popular</option>
          <option value="name">Name</option>
        </select>
      </div>
    </form>
  </div>
  <div class="row mb-5">
      <?php while($shoe = mysqli_fetch_assoc($shoe_set)) { ?>
        <div class="col-3 my-3">
          <div class="card text-center px-4" style="width: 15rem;">
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'" class="card-img-top"/>'; ?>
            <div class="card-body">
              <h6 class="card-title"><?php echo h($shoe['sneaker_name']); ?></h6>
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
