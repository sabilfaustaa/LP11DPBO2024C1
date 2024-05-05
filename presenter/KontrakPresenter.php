<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function createPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)	;
	public function getPasienById($id);
	public function updatePasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
	public function deletePasien($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
}
