<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="number" name="nim"></td>
		</tr>
		<tr>
			<td>NAMA</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>JENIS KELAMIN</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="Pria"> Pria <input type="radio" name="jk" value="Wanita"> Wanita</td>
		</tr>
		<tr>
			<td>PROGRAM STUDI</td>
			<td>:</td>
			<td><select name="prodi">
					<option value="-1">Pilih Prodi</option>
					<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
					<option value="S1 Akuntansi">S1 Akuntansi</option>
					<option value="D4 Sistem Informasi">D4 Sistem Informasi</option>
				</select></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
					<option value="-1">Pilih Fakultas</option>
					<option value="Ilmu Terapan">Ilmu Terapan</option>
					<option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
					<option value="Teknik Elektro">Teknik Elektro</option>
				</select></td>
		</tr>
		<tr>
			<td>ASAL</td>
			<td>:</td>
			<td><input type="text" name="asal"></td>
		</tr>
		<tr>
			<td>MOTTO HIDUP</td>
			<td>:</td>
			<td><textarea name="motto"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="KIRIM"> <a href="cari.php">CARI DATA</a></td>
		</tr>
	</table>
</form>

<?php
	error_reporting(0);
	if (isset($_POST['submit'])) {
			
			$koneksi = mysqli_connect("localhost", "root", "", "mhs");

			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jk = $_POST['jk'];
			$prodi = $_POST['prodi'];
			$fakultas = $_POST['fakultas'];
			$asal = $_POST['asal'];
			$motto = $_POST['motto'];

			$qrySelect = mysqli_query($koneksi, "SELECT * FROM data WHERE nim = '".$nim."'");
			$row = mysqli_fetch_array($qrySelect);

			if ($nim !== $row['nim']) {
				if ($prodi !== -1) {
					if ($fakultas !== -1) {
						$sql = mysqli_query($koneksi, "INSERT INTO `data` VALUES ('".$nim."','".$nama."','".$jk."','".$prodi."','".$fakultas."','".$asal."','".$motto."')");
						echo "DATA BERHASIL DITAMBAHKAN<br>";
					}
					else{
						echo "FAKULTAS Tidak Boleh Kosong";
					}
				}
				else{
					echo "PRODI Tidak Boleh Kosong";
				}
			}
			else{
				echo "NIM Telah Terdaftar";
			}
	}	
?>