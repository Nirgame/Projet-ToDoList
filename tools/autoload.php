<?php

spl_autoload_register(function($class_name) {
    $test_int = substr("$class_name", -3);
    if ($test_int === "int"){
        include_once("../interface/".$class_name.".interface.php");
    }
    else {
        include_once("../class/".$class_name.".class.php");
    }
});

?>