<!--php page displays account information and option to change information-->

<link rel="stylesheet" href="../private/css/main.css">

<?php
  require_once('../private/initialize.php');
  require_SSL();
?>

<?php

  //if user hits update button check validation and update information in database
  if(is_post_request()) {
    $errors = [];
    $admin['firstname'] = $_POST['firstname'] ?? '';
    $admin['lastname'] = $_POST['lastname'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['hashed_password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = update_admin($admin);
    if($result === true) {
      update_myaccount($admin);

    } else {
      $errors = $result;
    }

  } else {
      // display the blank form
      $admin = [];
      $admin["firstname"] = '';
      $admin["lastname"] = '';
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

  <h1>Current Account Information</h1>
  <table id="account-info">
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th>Email</th>
    <tr>
      <td><?php echo $_SESSION['firstname']; ?></td>
      <td><?php echo $_SESSION['lastname']; ?></td>
      <td><?php echo $_SESSION['username']; ?></td>
      <td><?php echo $_SESSION['email']; ?></td>
    </tr>
  </table>
  <br>
  <h1>Update Account Information</h1>

  <?php echo display_errors($errors); ?>

  <form action="myaccount.php" method="post">
      <dl>
        <dt>New First name</dt>
        <dd><input type="text" name="firstname" value="<?php echo h($admin['firstname']); ?>" /></dd>
      </dl>

      <dl>
        <dt>New Last name</dt>
        <dd><input type="text" name="lastname" value="<?php echo h($admin['lastname']); ?>" /></dd>
      </dl>

      <dl>
        <dt>New Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>New Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm New Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <br />

      <div id="operations">
        <input type="submit" value="Update" />
      </div>
    </form>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
