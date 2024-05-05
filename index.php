<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$id = @$_GET['id_hapus'];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id_hapus'])) {
    $presenter = new ProsesPasien();
    $result = $presenter->deletePasien($id);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Error: Gagal delete data";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $tp = new TampilPasien();
    $data = $tp->tampil();
}