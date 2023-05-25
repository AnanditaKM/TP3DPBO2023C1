<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Kategori.php');
include('classes/Supermarket.php');
include('classes/produk.php');
include('classes/Template.php');

$produk = new Produk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$produk->open();

$kategori = new Kategori($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$kategori->open();
$kategori->getKategori();

$supermarket = new Supermarket($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$supermarket->open();
$supermarket->getSupermarket();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $produk->getProdukById($id);
        $row = $produk->getResult();

        $listKategori = null;
        while ($div = $kategori->getResult()) {
        $listKategori .= '<option value="'. $div["category_id"]. '"';
        if ($row["category_id"] == $div["category_id"]) {
            $listKategori .= 'selected';
        }
        $listKategori .= '>'. $div["nama_kategori"] .'</option>';
        }
        
        $listSupermarket = null;
        while ($div = $supermarket->getResult()) {
        $listSupermarket .= '<option value="'. $div["supermarket_id"]. '"';
        if ($row["supermarket_id"] == $div["supermarket_id"]) {
            $listSupermarket .= 'selected';
        }
        $listSupermarket .= '>'. $div["nama_supermarket"] .'</option>';
        }

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Update ' . $row['nama_produk'] . '</h3>
        </div>
        <div class="card-body text-start">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto_produk'] . '" class="img-thumbnail" alt="' . $row['foto_produk'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                        <form action="update.php?id='. $id .'" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama" value="'. $row["nama_produk"] .'">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" aria-describedby="harga" placeholder="Masukkan harga" value="'. $row["harga"] .'">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" name="stok" id="stok" aria-describedby="stok" placeholder="Masukkan stok" value="'. $row["stok"] .'">
                            </div?
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto" placeholder="Masukkan foto">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="foto_sebelumnya" id="foto_sebelumnya" aria-describedby="foto_sebelumnya" value="'. $row["foto_produk"] .'">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" name="kategori" id="kategori" aria-label="kategori">
                                    <option></option>
                                    '. $listKategori .'
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="supermarket">Supermarket</label>
                                <select class="form-select" name="supermarket" id="supermarket" aria-label="kategori">
                                    <option></option>
                                    '. $listSupermarket .'
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" value="Upload" name="submit">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    $listKategori = null;
    while ($div = $kategori->getResult()) {
       $listKategori .= '<option value="'. $div["category_id"]. '">'. $div["nama_kategori"] .'</option>';
    }
    
    $listSupermarket = null;
    while ($div = $supermarket->getResult()) {
       $listSupermarket .= '<option value="'. $div["supermarket_id"]. '">'. $div["nama_supermarket"] .'</option>';
    }

    $data .= '<div class="card-header text-center">
        <h3 class="my-0">Tambah Produk</h3>
        </div>
        <div class="card-body text-start">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/noPhoto.png" class="img-thumbnail" alt="Foto Produk" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" aria-describedby="harga" placeholder="Masukkan harga">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" name="stok" id="stok" aria-describedby="stok" placeholder="Masukkan stok">
                            </div?
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto" placeholder="Masukkan foto">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" name="kategori" id="kategori" aria-label="kategori">
                                    <option></option>
                                    '. $listKategori .'
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="supermarket">Supermarket</label>
                                <select class="form-select" name="supermarket" id="supermarket" aria-label="kategori">
                                    <option></option>
                                    '. $listSupermarket .'
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" value="Upload" name="submit">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>';
}

$produk->close();
$detail = new Template('templates/skininsertupdate.html');
$detail->replace('DATA_DETAIL_PRODUK', $data);
$detail->write();
