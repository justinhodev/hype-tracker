<?php

//TEST PAGE
//-USED THIS PHP PAGE TO TEST SQL_FUNCTIONS.PHP

require_once('private/database.php');
require_once('private/sql_functions.php');
$db = db_connect();

?>

<?php

  $shoe_set = find_all_shoes();

?>

<?php $page_title = 'Home'; ?>

<div id="content">
  <div class="shoe listing">
    <h1>Shoes</h1>

  	<table class="list">
  	  <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Release Date</th>
        <th>Image</th>
  	    <th>Price</th>
  	  </tr>

      <?php while($shoe = mysqli_fetch_assoc($shoe_set)) { ?>
        <tr>
          <td><?php echo h($shoe['sneaker_name']); ?></td>
          <td><?php echo h($shoe['brand_name']); ?></td>
          <td><?php echo h($shoe['release_date']); ?></td>
    	    <td><?php echo h($shoe['image']); ?></td>
          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $shoe['image'] ).'"/>'; ?></td>
          <td><?php echo h($shoe['price']); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($shoe_set);
    ?>
  </div>

</div>
