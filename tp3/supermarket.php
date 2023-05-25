<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Supermarket.php');
include('classes/Template.php');

$supermarket = new Supermarket($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$supermarket->open();
$supermarket->getSupermarket();

$insertupdate = '
<div class="card-header text-center">
    <h3 class="my-0">Tambah DATA_MAIN_TITLE</h3>
</div>
<div class="card-body">
    <form action="supermarket.php" method="post" class="d-flex">
        <input type="text" class="form-control" placeholder="nama supermarket" name="insert" id="insert">
        <button class="btn btn-secondary ms-1" type="submit" name="btn-tambah">Tambah</button>
    </form>
</div>
';

if(isset($_POST["btn-tambah"])) {
    if (isset($_POST["insert"]) && $_POST["insert"] !== "") {
        $supermarket->addSupermarket($_POST);
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'supermarket.php';
        </script>";
    }
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Supermarket';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Supermarket</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'supermarket';

while ($div = $supermarket->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_supermarket'] . '</td>
    <td style="font-size: 22px;">
        <a href="supermarket.php?id=' . $div['supermarket_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="supermarket.php?hapus=' . $div['supermarket_id'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $supermarket->getSupermarketById($id);
        $row = $supermarket->getResult();
        $insertupdate = '
        <div class="card-header text-center">
            <h3 class="my-0">Update DATA_MAIN_TITLE</h3>
        </div>
        <div class="card-body">
            <form action="supermarket.php?id='. $id .'" method="post" class="d-flex">
                <input type="text" class="form-control" placeholder="nama supermarket" name="update" id="update" value="'. $row["nama_supermarket"].'">
                <button class="btn btn-secondary ms-1" type="submit" name="btn-ubah">Ubah</button>
            </form>
        </div>
        ';
        if (isset($_POST['btn-ubah'])) {
            if ($supermarket->updateSupermarket($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'supermarket.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'supermarket.php';
            </script>";
            }
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($supermarket->deleteSupermarket($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'supermarket.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'supermarket.php';
            </script>";
        }
    }
}

$supermarket->close();

$view->replace('DATA_INSERT_UPDATE', $insertupdate);
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_TABEL', $data);
$view->write();
