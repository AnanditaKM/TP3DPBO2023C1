<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Kategori.php');
include('classes/Template.php');

$kategori = new Kategori($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$kategori->open();
$kategori->getKategori();

$insertupdate = '
<div class="card-header text-center">
    <h3 class="my-0">Tambah DATA_MAIN_TITLE</h3>
</div>
<div class="card-body">
    <form action="kategori.php" method="post" class="d-flex">
        <input type="text" class="form-control" placeholder="nama kategori" name="insert" id="insert">
        <button class="btn btn-secondary ms-1" type="submit" name="btn-tambah">Tambah</button>
    </form>
</div>
';

if(isset($_POST["btn-tambah"])) {
    if (isset($_POST["insert"]) && $_POST["insert"] !== "") {
        $kategori->addKategori($_POST);
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'kategori.php';
        </script>";
    }
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Kategori';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Kategori</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'kategori';

while ($div = $kategori->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_kategori'] . '</td>
    <td style="font-size: 22px;">
        <a href="kategori.php?id=' . $div['category_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="kategori.php?hapus=' . $div['category_id'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $kategori->getKategoriById($id);
        $row = $kategori->getResult();
        $insertupdate = '
        <div class="card-header text-center">
            <h3 class="my-0">Update DATA_MAIN_TITLE</h3>
        </div>
        <div class="card-body">
            <form action="kategori.php?id='. $id .'" method="post" class="d-flex">
                <input type="text" class="form-control" placeholder="nama kategori" name="update" id="update" value="'. $row["nama_kategori"].'">
                <button class="btn btn-secondary ms-1" type="submit" name="btn-ubah">Ubah</button>
            </form>
        </div>
        ';
        if (isset($_POST['btn-ubah'])) {
            if ($kategori->updateKategori($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'kategori.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'kategori.php';
            </script>";
            }
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($kategori->deleteKategori($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'kategori.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'kategori.php';
            </script>";
        }
    }
}

$kategori->close();

$view->replace('DATA_INSERT_UPDATE', $insertupdate);
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_TABEL', $data);
$view->write();
