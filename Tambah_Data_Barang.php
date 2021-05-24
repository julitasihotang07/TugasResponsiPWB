<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah_Data_Barang</h3>
<hr/>
<form method="post" action="Proses_Data_Barang.php?action=add">
<table>
	<tr>
		<td>Id Barang</td>
		<td>:</td>
		<td><input type="text" name="id_barang"/></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="nama_barang"/></td>
	</tr>
	<tr>
		<td>harga</td>
		<td>:</td>
		<td><input type="text" name="harga"/></td>
	</tr>
    <tr>
		<td>stok</td>
		<td>:</td>
		<td><input type="text" name="stok"/></td>
	</tr>
    <tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="tombol" value="Simpan"/></td>
	</tr>
</table>
</form>
</body>
</html>