<?php



include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilFormPasien.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_GET['id'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $presenter = new ProsesPasien();
    $result = $presenter->createPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Error: Gagal simpan data";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $presenter = new ProsesPasien();
    $result = $presenter->updatePasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Error: Gagal update data";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $tp = new TampilFormPasien($id);
    $data = $tp->tampil();
}


