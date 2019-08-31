				<thead>
					<tr>
						<th>
							<center>No. Kendaraan
						</th>
						</center>
						<th>
							<center>Perusahaan PO
						</th>
						</center>
						<!--th><center>Nama Supir</th></center-->
						<th>
							<center>Kartu Pengawas
						</th>
						</center>
						<th>
							<center>Masa Berlaku Uji
						</th>
						</center>
						<!--th><center>Penumapang Naik</th></center>
						<th><center>Penumpang Turun</th></center-->
						<th>
							<center>Jumlah Penumpang
						</th>
						</center>
						<th>
							<center>Kelengkapan
						</th>
						</center>
						<!--th><center>Aksi</th></center-->
					</tr>
				</thead>
				<tbody>
					<?php
					$queryangkutan = mysqli_query($konek, "SELECT noken, po, supir, kp, DATE_FORMAT(uji, '%d-%m-%Y')as uji, naik, turun, jml, kel FROM angkutan");

					if ($queryangkutan == false) {
						die("Terjadi Kesalahan : " . mysqli_error($konek));
					}
					while ($angkutan = mysqli_fetch_array($queryangkutan)) {

						echo "
								<tr><center>
									<td><center>$angkutan[noken]</center></td>
									<td><center>$angkutan[po]</center></td>
									<!--td><center>$angkutan[supir]</center></td-->
									<td><center>$angkutan[kp]</center></td>
									<td><center>$angkutan[uji]</center></td>
									<!--td><center>$angkutan[naik]</center></td-->
									<!--td><center>$angkutan[turun]</center></td-->
									<td><center>$angkutan[jml]</center></td>
									<!--td><center>$angkutan[kel]</center></td-->
									<td>
										<a href='lihat.php?noken=$angkutan[noken]'>Lihat | </a>
										<a href='#' onclick='edit_form(this, " . '"dosen_modal_edit"' . ", " . '"noken"' . ", " . '"#ModalEditDosen"' . ")' id='$angkutan[noken]'>Edit | </a> 
										<a href='#' onclick='confirm_delete(\"dosen_delete.php?noken=$angkutan[noken]\")'>Hapus | </a>
										<a href= 'kwt.php?noken=$angkutan[noken]' target = _blank>Print KWT</a>
									</td>
								</tr>";
					}
					?>
				</tbody>