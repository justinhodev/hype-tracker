<?php

//TEST PAGE
//-USED THIS PHP PAGE TO TEST SQL_FUNCTIONS.PHP

  require_once('../private/initialize.php');
?>

<?php

  $shoe_set = find_all_shoes();

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Hype Tracker</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

<?php 
  //include(SHARED_PATH . '/public_header.php'); 
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="row">
      <?php while($shoe = mysqli_fetch_assoc($shoe_set)) { ?>
        <!-- <tr>
          <td><?php echo h($shoe['sneaker_name']); ?></td>
          <td><?php echo h($shoe['brand_name']); ?></td>
          <td><?php echo h($shoe['release_date']); ?></td>
    	    <td><?php echo h($shoe['image']); ?></td>
          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'"/>'; ?></td>
          <td><?php echo h($shoe['price']); ?></td>
    	  </tr> -->
      <div class="col-sm-6">
        <div class="card text-center border-dark mb-3" style="width: 15rem;">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'" class="card-img-top"/>'; ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo h($shoe['sneaker_name']); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo h($shoe['brand_name']); ?></p>
            <p class="card-text">$<?php echo h($shoe['price']); ?></p>
            <a href="/details.php?name= <?php echo h($shoe['sneaker_name']); ?>" class="card-link">Details</a>
          </div>
        </div>
      </div>
      <?php } ?>
</div>

<?php
      mysqli_free_result($shoe_set);
?>

<?php include(SHARED_PATH . '/public_footer.php');
