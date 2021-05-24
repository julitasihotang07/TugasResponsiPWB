<?php 
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->Tambah_Data_Barang($_POST['id_barang'],$_POST['nama_barang'],$_POST['harga'],$_POST['stok']);
	header('location:Tampil_Data_Barang.php');
}

elseif($action=="delete")
{
	$id_barang = $_GET['id_barang'];
	$koneksi->Delete_Data_Barang($id_barang);
	header('location:Tampil_Data_Barang.php');
}
?>