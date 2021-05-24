<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "pwb_193010503003";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function Tampil_Data_Barang()
	{
		$data = mysqli_query($this->koneksi,"select * from barang");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function Tampil_Data_Bayar()
	{
		$data = mysqli_query($this->koneksi,"select * from bayar");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function Tampil_Data_Siswa()
	{
		$data = mysqli_query($this->koneksi,"select * from Siswa");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}


    function Tambah_Data_Barang($id_barang,$nama_barang,$harga,$stok)
	{
		mysqli_query($this->koneksi,"insert into barang values ('$id_barang','$nama_barang','$harga','$stok')");
	}

	function Tambah_Data_Bayar($no_bayar,$tanggal_bayar,$id_siswa,$total_pembelian,$bayar,$sisa_bayar)
	{
		mysqli_query($this->koneksi,"insert into merk values ('$no_bayar,$tanggal_bayar','$id_siswa','$total_pembelian','$bayar','$sisa_bayar')");
	}
	function Tambah_Data_Siswa($id_siswa,$id_barang,$jumlah_beli)
	{
		mysqli_query($this->koneksi,"insert into detail_bayar values ('$id_siswa','$id_barang','$jumlah_beli')");
	}


    function get_by_id($id_barang)
	{
		$query = mysqli_query($this->koneksi,"select * from barang where id_barang ='$id_barang'");
		return $query->fetch_array();
	}
	function get_by_id_bayar($id_bayar)
	{
		$query = mysqli_query($this->koneksi,"select * from bayar where id_bayar ='$id_bayar'");
		return $query->fetch_array();
	} 
	function get_by_id_siswa($id_siswa)
	{
		$query = mysqli_query($this->koneksi,"select * from siswa where siswa ='$siswa'");
		return $query->fetch_array();
	}
	


    function Delete_Data_barang($id_barang)
	{
		$query = mysqli_query($this->koneksi,"delete from barang where id_barang='$id_barang'");
	}

	function Delete_Data_bayar($id_bayar)
	{
		$query = mysqli_query($this->koneksi,"delete from bayar where id_bayar='$id_bayar'");
	}
	function Delete_Data_siswa($siswa)
	{
		$query = mysqli_query($this->koneksi,"delete from siswa where siswa='$siswa'");
	}
}
?>