<?php
    require_once('../private/initialize.php');

    // return shoes by brand if this post data is set
    if (isset($_POST["brand_id"])) {
        if ($_POST["brand_id"] != '') {
            echo show_sneaker_by_brand($_POST["brand_id"]);
        } else {
            echo show_all_sneakers();
        }
    }

    // return shoes by search terms if this post data is set
    if (isset($_POST["search_data"])) {
        $search_val = trim($_POST["search_data"]);
        echo search_sneaker($search_val);
    }
?>