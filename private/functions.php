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

    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function is_get_request() {
      return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    function h($string="") {
      return htmlspecialchars($string);
    }

    function redirect_to($location) {
      header("Location: " . $location);
      exit;
    }

    function require_SSL(){
      if($_SERVER['HTTPS'] != 'on'){
        header("Location: https://" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']);
        exit();
      }
    }

    function no_SSL() {
    	if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS']== "on") {
    		header("Location: http://" . $_SERVER['HTTP_HOST'] .
    			$_SERVER['REQUEST_URI']);
    		exit();
    	}
    }

?>
