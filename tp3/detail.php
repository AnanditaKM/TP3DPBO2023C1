<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Kategori.php');
include('classes/Supermarket.php');
include('classes/produk.php');
include('classes/Template.php');

$produk = new Produk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$produk->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $produk->getProdukById($id);
        $row = $produk->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_produk'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto_produk'] . '" class="img-thumbnail" alt="' . $row['foto_produk'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_produk'] . '</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>' . $row['harga'] . '</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>' . $row['stok'] . '</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>' . $row['nama_kategori'] . '</td>
                                </tr>
                                <tr>
                                    <td>Supermarket</td>
                                    <td>:</td>
                                    <td>' . $row['nama_supermarket'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="insertupdate.php?id='. $id .'"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="delete.php?id='. $id .'"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$produk->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_PRODUK', $data);
$detail->write();
