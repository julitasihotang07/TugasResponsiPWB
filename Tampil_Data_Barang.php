<?php 	
include('koneksi.php');
$db = new database();
$data_barang = $db->Tampil_Data_Barang();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="Tambah_Data_Barang.php">Tambah_Data_Barang</a>
<table border="1">
		<tr>
		    <th>Id Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data_barang as $row){
			?>
			<tr>
				<td><?php echo $row['id_barang']; ?></td>
				<td><?php echo $row['nama_barang']; ?></td>
				<td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['stok']; ?></td>
				<td>
                    <a href="Proses_Data_Barang.php?action=delete&id_barang=<?php echo $row['id_barang']; ?>">Delete</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	
</body>
</html>