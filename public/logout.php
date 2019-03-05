<?php
  require_once('../private/initialize.php');

  //remove all session variables 
  session_destroy();

  redirect_to(url_for('login.php'));

?>
