<?php

include "config\config.php";
include "vendor\autoload.php";

var_dump($_GET['url']);
var_dump($_GET);



$path = substr(str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['PATH_INFO']), 1);
if (class_exists('core\database\PdoConnect')) new core\database\PdoConnect('ONE');
else {
    echo 'A keresett útvonal nem található: ' . $path;
}