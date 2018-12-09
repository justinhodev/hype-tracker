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
  <div class="row my-3 justify-content-between">
    <form>
      <div class="form-group">
        <select name="brand" id="brand" class="form-control">
          <option value="">All Sneakers</option>
          <?php echo list_all_brands(); ?>
        </select>
      </div>
    </form>
    <form action="GET">
      <div class="form-group">
        <input class="form-control" type="text" placeholder="Search" id="sneaker_search">
      </div>
    </form>
  </div>
  <div id="search_result" style="display: none"></div>
  <div class="row mb-5" id="show_product">
    <?php echo show_all_sneakers(); ?>
  </div>
</div>

<script><?php include(PRIVATE_PATH . '/js/ajax.js') ?></script>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
