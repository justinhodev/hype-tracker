<?php
  require_once('../private/initialize.php');

  unset($_SESSION['member_id']);
  unset($_SESSION['username']);

  redirect_to(url_for('login.php'));

?>
