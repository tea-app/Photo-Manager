<?php

require_once(__DIR__.'/app/connect.php');
require_once(__DIR__.'/app/Search.php');

$pdo = connect();

$search = new Search($pdo);
$url = $search->byTag('abstract_net');
for ($i=0; $i < count($url); $i++) {
    if ($url[$i] != null) echo $url[$i] . PHP_EOL;
}
