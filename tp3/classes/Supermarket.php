<?php

class Supermarket extends DB
{
    function getSupermarket()
    {
        $query = "SELECT * FROM supermarket";
        return $this->execute($query);
    }

    function getSupermarketById($id)
    {
        $query = "SELECT * FROM supermarket WHERE supermarket_id=$id";
        return $this->execute($query);
    }

    function addSupermarket($data)
    {
        $nama = $data['insert'];
        $query = "INSERT INTO supermarket VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateSupermarket($id, $data)
    {
        $nama = $data["update"];
        $query = "UPDATE supermarket SET nama_supermarket='$nama' WHERE supermarket_id='$id'";
        return $this->executeAffected($query);
    }

    function deleteSupermarket($id)
    {
        $query = "DELETE FROM supermarket WHERE supermarket_id='$id'";
        return $this->executeAffected($query);
    }
}
