<?php

class Produk extends DB
{
    function getProdukJoin($urut = 'produk.nama_produk')
    {
        $query = "SELECT * FROM produk JOIN kategori ON produk.category_id=kategori.category_id JOIN supermarket ON produk.supermarket_id=supermarket.supermarket_id ORDER BY $urut";
        return $this->execute($query);
    }

    function getProduk()
    {
        $query = "SELECT * FROM produk";
        return $this->execute($query);
    }

    function getProdukById($id)
    {
        $query = "SELECT * FROM produk JOIN kategori ON produk.category_id=kategori.category_id JOIN supermarket ON produk.supermarket_id=supermarket.supermarket_id WHERE produk.produk_id=$id";
        return $this->execute($query);
    }

    function searchProduk($keyword, $urut = 'produk.nama_produk')
    {
        $query = "SELECT * FROM produk JOIN kategori ON produk.category_id=kategori.category_id JOIN supermarket ON produk.supermarket_id=supermarket.supermarket_id WHERE produk.nama_produk LIKE '%$keyword%' ORDER BY $urut";
        return $this->execute($query);
    }

    function addData($nama, $harga, $stok, $foto, $kategori, $supermarket)
    {
        $query = "INSERT INTO produk VALUES('', '$nama', '$harga', '$stok', '$foto', '$kategori', '$supermarket')";
        return $this->executeAffected($query);
    }

    function updateData($id, $nama, $harga, $stok, $foto, $kategori, $supermarket)
    {
        $query = "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok', foto_produk='$foto', category_id='$kategori', supermarket_id='$supermarket' WHERE produk_id='$id'";
        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $query = "DELETE FROM produk WHERE produk_id='$id'";
        return $this->executeAffected($query);
    }
}
