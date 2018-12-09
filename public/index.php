<!--php page shows all sneakers in database-->

<?php
  require_once('../private/initialize.php');
  no_SSL();

?>

<?php
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="container">
  <div class="row my-3 justify-content-end">
    <form>
      <div class="form-group">
        <select name="brand" id="brand" class="form-control">
          <option value="">Show All Sneakers</option>
          <?php echo list_all_brands(); ?>
        </select>
      </div>
    </form>
  </div>
  <div class="row mb-5">
      <?php echo show_all_sneakers(); ?>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
