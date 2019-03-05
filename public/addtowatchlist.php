<!--php page used to add a sneaker to members watchlist-->

<?php
  require_once('../private/initialize.php');
?>

<?php

  $sneaker_id = $_POST['sneaker_id'];
  $sneaker_name = $_POST['sneaker_name'];

  $message = "";
  if (!is_in_watchlist($sneaker_id)) {

  	insert_in_watchlist($sneaker_id);

  	$message = urlencode("The sneaker has been added to your <a href=\"showwatchlist.php\">watchlist</a>.");
  }

  redirect_to("details.php?id=$sneaker_id&name=$sneaker_name&message=$message");
?>
