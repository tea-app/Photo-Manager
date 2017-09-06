<?php

require_once(__DIR__.'/connect.php');
require_once(__DIR__.'/FileReceiver.php');
require_once(__DIR__.'/Photo.php');


$files = $_FILES;
$receiver = new FileReceiver($files);
$receiver->upload();

$filename = $_FILES['image']['name'];
$pdo = connect();
$photo = new Photo($pdo);
$photo->insert($filename);

