<?php
    require_once('../private/initialize.php');

    if (isset($_POST["brand_id"])) {
        if ($_POST["brand_id"] != '') {
            echo show_sneaker_by_brand($_POST["brand_id"]);
        } else {
            echo show_all_sneakers();
        }
    }
?>