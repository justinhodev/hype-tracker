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
      //$_SESSION['message'] = 'User created.';
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


<div id="content">
  <h1>Register</h1>

  <?php echo display_errors($errors); ?>

  <form action="register.php" method="post">
      <dl>
        <dt>First name</dt>
        <dd><input type="text" name="firstname" value="<?php echo h($admin['firstname']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input type="text" name="lastname" value="<?php echo h($admin['lastname']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email </dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /><br /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <br />

      <div id="operations">
        <input type="submit" value="Register" />
      </div>
    </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
