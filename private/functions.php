<?php

    function url_for($script_path) {
        if($script_path[0] != '/') {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    function page_not_found() {
        redirect(WWW_ROOT . "/public/index.php");
    }

    function redirect($url) {
        header("Location: " . $url);
    }

?>