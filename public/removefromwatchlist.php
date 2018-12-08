<!--php page used to remove a sneaker from members watchlist-->

<?php
  require_once('../private/initialize.php');
?>

<?php

  $sneaker_id = $_POST['sneaker_id'];


  $message = "";

  //query to database
  remove_from_watchlist($sneaker_id);

  $message = urlencode("The sneaker has been removed from your watchlist.");

  redirect_to("showwatchlist.php?message=$message");

?>
