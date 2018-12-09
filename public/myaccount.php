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


<div id="content" class="container">

  <h4>Current Account Information</h1>
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

  <div class="row">
    <div class="col-md">
      <h4>Update Account Information</h1>
    </div>
  </div>

  <?php echo display_errors($errors); ?>

  <div class="row">
    <div class="col-3">
      <form action="myaccount.php" method="post">
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
          <label>Password</label>
          <input class="form-control" type="password" name="password" value="" />
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <input class="form-control" type="password" name="confirm_password" value="" />
        </div>

        <div id="operations">
          <input type="submit" class="btn btn-secondary" value="Update" />
        </div>
      </form>
    </div>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
