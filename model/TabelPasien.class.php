<?php

class TabelPasien extends DB
{
    // mengambil semua data pasien
    function getPasien()
    {
        $query = "SELECT * FROM pasien";
        return $this->execute($query);
    }

    // mengambil data pasien berdasarkan ID
    function getPasienById($id)
    {
        $id_safe = mysqli_real_escape_string($this->db_link, $id);
        $query = "SELECT * FROM pasien WHERE id = '$id_safe'";
        $result = $this->execute($query);
        return $result ? mysqli_fetch_assoc($result) : false;
    }

    // menambahkan data pasien baru
    function createPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db_link->prepare($query);
        $stmt->bind_param("sssssss", $nik, $nama, $tempat, $tl, $gender, $email, $telp);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // memperbarui data pasien
    function updatePasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        $query = "UPDATE pasien SET nik = ?, nama = ?, tempat = ?, tl = ?, gender = ?, email = ?, telp = ? WHERE id = ?";
        $stmt = $this->db_link->prepare($query);
        $stmt->bind_param("sssssssi", $nik, $nama, $tempat, $tl, $gender, $email, $telp, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // menghapus data pasien
    function deletePasien($id)
    {
        $query = "DELETE FROM pasien WHERE id = ?";
        $stmt = $this->db_link->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}

