<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Produk.php');
include('classes/Template.php');

$target_dir = "assets/images/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$foto = $_POST["foto_sebelumnya"];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && !empty($_FILES["foto"]["tmp_name"])) {
  $check = getimagesize($_FILES["foto"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
// Check file size
  if ($_FILES["foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
    $foto = $_FILES["foto"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
}

}

}

$nama = $_POST["nama"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$kategori = $_POST["kategori"];
$supermarket = $_POST["supermarket"];

$produk = new Produk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$produk->open();
$produk->updateData($_GET["id"], $nama, $harga, $stok, $foto, $kategori, $supermarket);

header("Location: index.php");