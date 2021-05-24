<?php 
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->Tambah_Data_Siswa($_POST['id_siswa'],$_POST['id_barang'],$_POST['jumlah_beli']);
	header('location:Tampil_Data_Siswa.php');
}

elseif($action=="delete")
{
	$id_siswa = $_GET['id_siswa'];
	$koneksi->Delete_Data_siswa($id_siswa);
	header('location:Tampil_Data_Siswa.php');
}
?>