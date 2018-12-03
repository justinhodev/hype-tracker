<?php
  require_once('../private/initialize.php');

  session_destroy();

  redirect_to(url_for('login.php'));

?>
