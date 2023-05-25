<?php

class Kategori extends DB
{
    function getKategori()
    {
        $query = "SELECT * FROM kategori";
        return $this->execute($query);
    }

    function getKategoriById($id)
    {
        $query = "SELECT * FROM kategori WHERE category_id=$id";
        return $this->execute($query);
    }

    function addKategori($data)
    {
        $nama = $data['insert'];
        $query = "INSERT INTO kategori VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateKategori($id, $data)
    {
        $nama = $data["update"];
        $query = "UPDATE kategori SET nama_kategori='$nama' WHERE category_id='$id'";
        return $this->executeAffected($query);
    }

    function deleteKategori($id)
    {
        $query = "DELETE FROM kategori WHERE category_id='$id'";
        return $this->executeAffected($query);
    }
}
