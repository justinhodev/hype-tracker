<?

  // Shoes

  //return all shoes from sneakers
  function find_all_shoes() {
    global $db;

    $sql = "SELECT * FROM sneakers INNER JOIN brands ON sneakers.brand_id=brands.brand_id";

    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // get shoe by id and name
  function get_sneaker($sneaker_id, $sneaker_name) {
    global $db;

    $sql = "SELECT * FROM sneakers
      INNER JOIN brands ON sneakers.brand_id=brands.brand_id
      WHERE sneakers.sneaker_id=" . $sneaker_id . " AND sneakers.sneaker_name='". $sneaker_name . "' LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;

  }

  function get_ranking($sneaker_id) {
    global $db;

    $sql = "SELECT * FROM rankings WHERE sneaker_id=" . $sneaker_id;

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  //may need to change this function in future
  function update_ranking($sneaker_id, $num_of_retweets) {
    global $db;

    $sql = "UPDATE rankings SET ";
    $sql .= "score='" . db_escape($db, $num_of_retweets) . "', ";
    $sql .= "number_of_mentions='" . db_escape($db, $num_of_retweets) . "' ";
    $sql .= "WHERE sneaker_id='" . db_escape($db, $sneaker_id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function validate_admin($admin) {
    $errors = [];

    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
      $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['member_id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

    if(is_blank($admin['hashed_password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['hashed_password'], array('min' => 12))) {
      $errors[] = "Password must contain 12 or more characters";
    }

    if(is_blank($admin['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($admin['hashed_password'] !== $admin['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    return $errors;
  }

  function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['hashed_password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO members ";
    $sql .= "(firstname, lastname, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function is_in_watchlist($sneaker_id) {
  	global $db;
  	if (isset($_SESSION['member_id'])) {
  		$query = "SELECT COUNT(*) FROM watchlist WHERE sneaker_id=? AND member_id=?";
  		$stmt = $db->prepare($query);
  		$stmt->bind_param('ss',$sneaker_id, $_SESSION['member_id']);
  		$stmt->execute();
  		$stmt->bind_result($count);
  	    return ($stmt->fetch() && $count > 0);
  	}
  	return false;
  }

  function insert_in_watchlist($sneaker_id) {
    global $db;

    $sql = "INSERT INTO watchlist ";
    $sql .= "(sneaker_id, member_id) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $sneaker_id) . "',";
    $sql .= "'" . db_escape($db, $_SESSION['member_id']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function get_watchlist(){
    global $db;

    //$sql = "SELECT DISTINCT sneaker_id FROM watchlist WHERE member_id = ?";

    $sql = "SELECT S.sneaker_id, S.sneaker_name, S.release_date, S.price ";
    $sql .= "FROM sneakers S INNER JOIN watchlist W ON S.sneaker_id = W.sneaker_id ";
    $sql .= "WHERE W.member_id=" .$_SESSION['member_id'];

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


?>
