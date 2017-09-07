<?php

require_once(__DIR__.'/connect.php');
require_once(__DIR__.'/FileReceiver.php');
require_once(__DIR__.'/Photo.php');


$receiver = new FileReceiver($_FILES);
$receiver->upload();

/* api */

$pdo = connect();
$photo = new Photo($pdo);
$photo->insert($_FILES['image']['name']);

//$photo->select($_GET['filename']);
