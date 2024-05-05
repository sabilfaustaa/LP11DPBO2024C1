<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilFormPasien implements KontrakView
{
    private $prosespasien;
    private $tpl;

    function __construct($id = null)
    {
        $this->prosespasien = new ProsesPasien();
        $this->tpl = new Template("templates/skin_form.html");

        if ($id !== null) {
            $pasien = $this->prosespasien->getPasienById($id);
            $form_action = "form-pasien.php?id=" . $id;
            $nik = htmlspecialchars($pasien['nik']);
            $nama = htmlspecialchars($pasien['nama']);
            $tempat = htmlspecialchars($pasien['tempat']);
            $tl = htmlspecialchars($pasien['tl']);
            $email = htmlspecialchars($pasien['email']);
            $telp = htmlspecialchars($pasien['telp']);
            $selected_l = $pasien['gender'] == 'Laki-laki' ? 'selected' : '';
            $selected_p = $pasien['gender'] == 'Perempuan' ? 'selected' : '';
        } else {
            $form_action = "form-pasien.php";
            $nik = $nama = $tempat = $tl = $email = $telp = '';
            $selected_l = $selected_p = '';
        }

        $data_form = "
            <form action='$form_action' method='post'>
                <div class='form-group'>
                    <label for='nik'>NIK</label>
                    <input type='text' class='form-control' id='nik' name='nik' value='$nik' required />
                </div>
                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='text' class='form-control' id='email' name='email' value='$email' required />
                </div>
                <div class='form-group'>
                    <label for='telp'>Telepon</label>
                    <input type='text' class='form-control' id='telp' name='telp' value='$telp' required />
                </div>
                <div class='form-group'>
                    <label for='nama'>Nama</label>
                    <input type='text' class='form-control' id='nama' name='nama' value='$nama' required />
                </div>
                <div class='form-group'>
                    <label for='tempat'>Tempat Lahir</label>
                    <input type='text' class='form-control' id='tempat' name='tempat' value='$tempat' required />
                </div>
                <div class='form-group'>
                    <label for='tl'>Tanggal Lahir</label>
                    <input type='date' class='form-control' id='tl' name='tl' value='$tl' />
                </div>
                <div class='form-group'>
                    <label for='gender'>Gender</label>
                    <select class='form-control' id='gender' name='gender'>
                        <option value='Laki-laki' $selected_l>Laki-laki</option>
                        <option value='Perempuan' $selected_p>Perempuan</option>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
                <a href='index.php' class='btn btn-secondary'>Cancel</a>
            </form>";

        $this->tpl->replace("DATA_FORM", $data_form);
    }

    public function tampil()
    {
        $this->tpl->write();
    }
}


?>
