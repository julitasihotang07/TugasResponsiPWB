<?php 
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->Tambah_Data_Bayar($_POST['no_bayar'],$_POST['tanggal_bayar'],$_POST['id_siswa'],$_POST['total_pembelian'],$_POST['bayar'],$_POST['sisa_bayar']);
	header('location:Tampil_Data_Bayar.php');
}

elseif($action=="delete")
{

	$no_bayar = $_GET['no_bayar'];
	$koneksi->Delete_Data_Bayar($no_bayar);
	header('location:Tampil_Data_Bayar.php');
}
?>