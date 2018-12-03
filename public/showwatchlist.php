<?php
  require_once('../private/initialize.php');
  no_SSL();

  $watchlist_set = get_watchlist();
?>


<?
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<table>
  <th>Sneaker Name</th>
  <th>Release Date</th>
  <th>Price</th>

  <?php
    while($watch = mysqli_fetch_assoc($watchlist_set)) {

      echo "<tr>";
      echo "<td><a href=\"details.php?id=" .$watch['sneaker_id'] ."&name=" .$watch['sneaker_name'] ."\">" .$watch['sneaker_name'] ."</a></td>";
      echo "<td>" .$watch['release_date'] ."</td>";
      echo "<td>" .$watch['price'] ."</td>";
      echo "</tr>";

    }
  ?>

</table>


<?php
      mysqli_free_result($watchlist_set);
?>
