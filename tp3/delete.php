<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Produk.php');
include('classes/Template.php');

$produk = new Produk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$produk->open();
$produk->deleteData($_GET["id"]);

header("Location: index.php");