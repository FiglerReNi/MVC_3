<?php


use core\database\PdoConnect;
use core\routing\Routing;

include __DIR__ . '\vendor\autoload.php';

$pdo = new PdoConnect();
new Routing();

