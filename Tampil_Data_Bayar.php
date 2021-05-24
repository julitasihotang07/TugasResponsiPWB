<?php 	
include('koneksi.php');
$db = new database();
$data_barang = $db->Tampil_Data_Bayar();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="Tambah_Data_Bayar.php">Tambah_Data_Bayar</a>
<table border="1">
		<tr>
		    <th>No Bayar</th>
			<th>Tanggal Bayar</th>
			<th>id Siswa</th>
			<th>Total Pembelian</th>
			<th>Bayar</th>
			<th>Sisa Bayar</th>
            <th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data_barang as $row){
			?>
			<tr>
				<td><?php echo $row['no_bayar']; ?></td>
				<td><?php echo $row['tanggal_bayar']; ?></td>
				<td><?php echo $row['id_siswa']; ?></td>
				<td><?php echo $row['total_pembelian']; ?></td>
				<td><?php echo $row['bayar']; ?></td>
				<td><?php echo $row['sisa_bayar']; ?></td>
				<td>
                    <a href="Proses_Data_Bayar.php?action=delete&no_bayar=<?php echo $row['no_bayar']; ?>">Delete</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	
</body>
</html>