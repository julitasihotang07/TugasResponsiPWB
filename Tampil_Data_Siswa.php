<?php 	
include('koneksi.php');
$db = new database();
$data_barang = $db->Tampil_Data_Siswa();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="Tambah_Data_Siswa.php">Tambah_Data_Siswa</a>
<table border="1">
		<tr>
		    <th>Id Siswa</th>
			<th>Id Barang</th>
			<th>Jumlah Beli</th>
            <th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data_barang as $row){
			?>
			<tr>
				<td><?php echo $row['id_siswa']; ?></td>
				<td><?php echo $row['id_barang']; ?></td>
				<td><?php echo $row['jumlah_beli']; ?></td>
				<td>
                    <a href="Proses_Data_Siswa.php?action=delete&id_siswa=<?php echo $row['id_siswa']; ?>">Delete</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	
</body>
</html>