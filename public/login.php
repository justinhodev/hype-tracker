<?php
  require_once('../private/initialize.php');
  require_SSL();

  $errors = [];
  $username = '';
  $password = '';
?>

<?

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful.";

    $admin = find_admin_by_username($username);
    if($admin) {

      if(password_verify($password, $admin['hashed_password'])) {
        // password matches
        log_in_admin($admin);
        //redirect_to(url_for('index.php'));
        redirect_to("http://" .$_SERVER['HTTP_HOST'] .$doc_root ."/index.php");
      } else {
        // username found, but password does not match
        $errors[] = $login_failure_msg;
      }

    } else {
      // no username found
      $errors[] = $login_failure_msg;
    }

  }

}

?>


<?
  include(SHARED_PATH . '/public_header.php');
  include(SHARED_PATH . '/public_navigation.php');
?>

<div class="container" id="content">
<div class="row justify-content-center my-5">
<div class="col-md-6">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input class="form-control" id="username" type="text" name="username" value="<?php echo h($username); ?>" />
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" value="" /><br />
    </div>
      <input class="btn btn-secondary" type="submit" name="submit" value="Submit"  />
  </form>
  <br />
  <br />
  <a href="register.php">Don't have an account? Register Here</a>
</div>
</div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
