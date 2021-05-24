<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Tambah_Data_Bayar</h3>
<hr/>
<form method="post" action="Proses_Data_Bayar.php?action=add">
<table>
	<tr>
		<td>No Bayar</td>
		<td>:</td>
		<td><input type="text" name="no_bayar"/></td>
	</tr>
	<tr>
		<td>Tanggal Bayar</td>
		<td>:</td>
		<td><input type="text" name="tanggal_bayar"/></td>
	</tr>
	<tr>
		<td>Id Siswa</td>
		<td>:</td>
		<td><input type="text" name="id_siswa"/></td>
	</tr>
    <tr>
		<td>Total Pembelian</td>
		<td>:</td>
		<td><input type="text" name="total_pembelian"/></td>
	</tr>
    <tr>
		<td>Bayar</td>
		<td>:</td>
		<td><input type="text" name="bayar"/></td>
	</tr>
    <tr>
		<td>Sisa Bayar</td>
		<td>:</td>
		<td><input type="text" name="sisa_bayar"/></td>
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