<!--php page allows users to register for an account-->

<?php
  require_once('../private/initialize.php');

?>

<?

  if(is_post_request()) {
    $errors = [];
    $admin['firstname'] = $_POST['firstname'] ?? '';
    $admin['lastname'] = $_POST['lastname'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['hashed_password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_admin($admin);
    if($result === true) {
      $new_id = mysqli_insert_id($db);
      
      redirect_to(url_for('login.php'));
    } else {
      $errors = $result;
    }

  } else {
    // display the blank form
    $admin = [];
    $admin["firstname"] = '';
    $admin["lastname"] = '';
    $admin["email"] = '';
    $admin["username"] = '';
    $admin['hashed_password'] = '';
    $admin['confirm_password'] = '';
  }

?>


<?
include(SHARED_PATH . '/public_header.php');
include(SHARED_PATH . '/public_navigation.php');
?>


<div class="container" id="content">
<div class="row justify-content-center my-5">
<div class="col-md-6">
  <h1>Register</h1>

  <?php echo display_errors($errors); ?>

  <form action="register.php" method="post">
      <div class="form-group">
        <label for="firstname">First name</label>
        <input id="firstname" class="form-control" type="text" name="firstname" value="<?php echo h($admin['firstname']); ?>" />
      </div>

      <div class="form-group">
        <label>Last name</label>
        <input class="form-control" type="text" name="lastname" value="<?php echo h($admin['lastname']); ?>" />
      </div>

      <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" name="username" value="<?php echo h($admin['username']); ?>" />
      </div>

      <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="text" name="email" value="<?php echo h($admin['email']); ?>" />
      </div>

      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" value="" />
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="password" name="confirm_password" value="" />
      </div>

      <div id="operations">
        <input class="btn btn-secondary" type="submit" value="Register" />
      </div>
    </form>
</div>
</div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
