<?php

switch ($_POST["options"]) {
    case "category":
        require_once("search_cat.php");
        break;
    case "location":
        require_once("search_loc.php");
}

die();

?>