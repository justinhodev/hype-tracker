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


  function h($string="") {
    return htmlspecialchars($string);
  }

?>
