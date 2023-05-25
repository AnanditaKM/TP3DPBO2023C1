<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Kategori.php');
include('classes/Supermarket.php');
include('classes/Produk.php');
include('classes/Template.php');

// buat instance Produk
$listProduk = new Produk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listProduk->open();
// tampilkan data Produk
$listProduk->getProdukJoin();

$data_urutan = '
<option value="produk.nama_produk" selected>Nama Produk</option>
<option value="kategori.nama_kategori">Kategori</option>
<option value="supermarket.nama_supermarket">Supermarket</option>';

$urut = 'produk.nama_produk';
if (isset($_POST['btn-urut'])) {
    $urut = $_POST['urut'];
    if ($urut === 'kategori.nama_kategori') {
        $data_urutan = '
        <option value="produk.nama_produk">Nama Produk</option>
        <option value="kategori.nama_kategori" selected>Kategori</option>
        <option value="supermarket.nama_supermarket">Supermarket</option>';
    } else if ($urut === 'supermarket.nama_supermarket') {
        $data_urutan = '
        <option value="produk.nama_produk">Nama Produk</option>
        <option value="kategori.nama_kategori">Kategori</option>
        <option value="supermarket.nama_supermarket" selected>Supermarket</option>';
    }
}

// cari Produk
if (isset($_POST['btn-cari'])) {
    // methode mencari data Produk
    $listProduk->searchProduk($_POST['cari'], $urut);
} else {
    // method menampilkan data Produk
    $listProduk->getProdukJoin($urut);
}

$data = null;

// ambil data Produk
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listProduk->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 produk-thumbnail">
        <a href="detail.php?id=' . $row['produk_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['foto_produk'] . '" class="card-img-top" alt="' . $row['foto_produk'] . '">
            </div>
            <div class="card-body">
                <p class="card-text produk-nama my-0">' . $row['nama_produk'] . '</p>
                <p class="card-text kategori-nama">' . $row['nama_kategori'] . '</p>
                <p class="card-text supermarket-nama my-0">' . $row['nama_supermarket'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listProduk->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_URUTAN', $data_urutan);
$home->replace('DATA_PRODUK', $data);
$home->write();
