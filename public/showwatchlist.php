<!--php page shows users watchlist-->

<link rel="stylesheet" href="../private/css/main.css">

<?php

  require_once('../private/initialize.php');
  no_SSL();

  $watchlist_set = get_watchlist();

  @$msg = trim($_GET['message']);
?>


<?
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<table id="watchlist-items">
  <th>Sneaker Name</th>
  <th>Release Date</th>
  <th>Price</th>
  <th></th>

  <?php
    while($watch = mysqli_fetch_assoc($watchlist_set)) {

      echo "<tr>";
      echo "<td><a href=\"details.php?id=" .$watch['sneaker_id'] ."&name=" .$watch['sneaker_name'] ."\">" .$watch['sneaker_name'] ."</a></td>";
      echo "<td>" .$watch['release_date'] ."</td>";
      echo "<td>" .$watch['price'] ."</td>";

      echo "<td>";
      echo "<form action=\"removefromwatchlist.php\" method=\"post\">\n";
    	echo "<input type=\"hidden\" name=\"sneaker_id\" value=" .$watch['sneaker_id'] .">\n";
    	echo "<input type=\"submit\" value=\"Remove from Watchlist\">\n";
    	echo "</form>\n";
      echo "</td>";
      echo "</tr>";

    }

    if (!empty($msg)){
      echo "<p>$msg</p>\n";
    }
  ?>

</table>


<?php
      mysqli_free_result($watchlist_set);
?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
