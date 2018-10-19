			<form method="POST">
					<table>
						<tr>
							<td>CARI</td>
							<td>:</td>
							<td><input type="text" name="cariNim" placeholder="Cari NIM"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="cari" value="CARI"> <a href="index.php">Input Data</a></td>
						</tr>
					</table>
			</form>

				<?php
					error_reporting(0);
					$koneksi = mysqli_connect("localhost", "root", "", "mhs");
					if (isset($_POST['cari'])) {
						$cariNim = $_POST['cariNim'];

						$query = mysqli_query($koneksi, "SELECT * FROM data WHERE nim = '".$cariNim."'");
						$row1 = mysqli_fetch_array($query);

						echo "Hasil Pencarian '<b>".$cariNim."</b>'";

						echo "<table border=1>
								<tr>
									<th>NIM</th>
									<th>NAMA</th>
									<th>JENIS KELAMIN</th>
									<th>PROGRAM STUDI</th>
									<th>FAKULTAS</th>
									<th>ASAL</th>
									<th>MOTTO HIDUP</th>
									<th>AKSI</th>
								</tr>";

						foreach ($query as $qry) {
							echo "<tr>
									<td>".$qry['nim']."</td>
									<td>".$qry['nama']."</td>
									<td>".$qry['jk']."</td>
									<td>".$qry['prodi']."</td>
									<td>".$qry['fakultas']."</td>
									<td>".$qry['asal']."</td>
									<td>".$qry['motto']."</td>
									<td><a href='hapus.php?nim=".$row1['nim']."'>HAPUS</a></td>
								  </tr>";
						}
					}
					else{
					$qryTampil = mysqli_query($koneksi, "SELECT * FROM data");

						echo "<table border=1>
								<tr>
									<th>NIM</th>
									<th>NAMA</th>
									<th>JENIS KELAMIN</th>
									<th>PROGRAM STUDI</th>
									<th>FAKULTAS</th>
									<th>ASAL</th>
									<th>MOTTO HIDUP</th>
									<th>AKSI</th>
								</tr>";

						foreach ($qryTampil as $qt) {
							echo "<tr>
									<td>".$qt['nim']."</td>
									<td>".$qt['nama']."</td>
									<td>".$qt['jk']."</td>
									<td>".$qt['prodi']."</td>
									<td>".$qt['fakultas']."</td>
									<td>".$qt['asal']."</td>
									<td>".$qt['motto']."</td>
									<td><a href='hapus.php?nim=".$qt['nim']."'>HAPUS</a></td>
								  </tr>";
						}
					$pesan = $_GET['pesan'];
					echo $pesan;
					}
				?>