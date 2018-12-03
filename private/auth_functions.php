<?

  function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
      $output .= "<div class=\"errors\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

  // Performs all actions necessary to log in a user
  function log_in_admin($admin) {
  // Renerating the ID protects the user from session fixation.
    session_regenerate_id();
    $_SESSION['member_id'] = $admin['member_id'];
    //$_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    $_SESSION['firstname'] = $admin['firstname'];
    $_SESSION['lastname'] = $admin['lastname'];
    $_SESSION['email'] = $admin['email'];
    return true;
  }

  function update_myaccount($admin){
    $_SESSION['username'] = $admin['username'];
    $_SESSION['firstname'] = $admin['firstname'];
    $_SESSION['lastname'] = $admin['lastname'];
    return true;
  }

  function is_logged_in() {
	  return isset($_SESSION['member_id']);
  }

  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  function has_unique_username($username, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND member_id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $admin_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $admin_count === 0;
  }

?>
