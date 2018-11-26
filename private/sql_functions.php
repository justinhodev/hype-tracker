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

  function h($string="") {
    return htmlspecialchars($string);
  }

?>
