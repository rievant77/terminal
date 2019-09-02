<?php

include "../koneksi.php";

$id	= $_GET["id"];

$queryangkutan = mysqli_query($konek, "SELECT * FROM angkutan WHERE id='$id'");
if ($queryangkutan == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}



while ($angkutan = mysqli_fetch_array($queryangkutan)) {

	$o = explode(', ', $angkutan['kel']);
	?>

	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
	<script>
		$(function() {
			// Daterange Picker
			$('#uji2').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				format: 'YYYY-MM-DD'
			});
		});
	</script>
	<!-- Modal Popup Dosen -->
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="dosen_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label>No Kendaraan</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-id-card"></i>
							</div>
							<input name="noken" type="text" class="form-control" value="<?php echo $angkutan["noken"]; ?>" readonly />
						</div>
					</div>
					<div class="form-group">
						<label>Perusahaan PO</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="po" type="text" class="form-control" value="<?php echo $angkutan["po"]; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Nama Supir</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="supir" type="text" class="form-control" value="<?php echo $angkutan["supir"]; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Kartu Pengawas</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="kp" type="text" class="form-control" value="<?php echo $angkutan["kp"]; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Masa Berlaku Uji</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input id="uji2" name="uji" type="text" class="form-control" value="<?php echo $angkutan["uji"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label>Penumpang Naik</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="naik" type="text" class="form-control" value="<?php echo $angkutan["naik"]; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Penumpang Turun</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="turun" type="text" class="form-control" value="<?php echo $angkutan["turun"]; ?>" />
						</div>
					</div>

					<div class="form-group" method="post">
						<label>Kelengapan</label>
						<div class="input-group" class="checkbox">
							<label><input name="kel[]" type="checkbox" value="Ban Cadangan" <?php in_array('Ban Cadangan', $o) ? print "checked" : ""; ?>>Ban Cadangan</label>
						</div>
						<div class="input-group" class="checkbox">
							<label><input name="kel[]" type="checkbox" value="Segitiga Pengaman" <?php in_array('Segitiga Pengaman', $o) ? print "checked" : ""; ?>>Segitiga Pengaman</label>
						</div>
						<div class="input-group" class="checkbox">
							<label><input name="kel[]" type="checkbox" value="Dongkrak" <?php in_array('Dongkrak', $o) ? print "checked" : ""; ?>>Dongkrak</label>
						</div>
						<div class="input-group" class="checkbox">
							<label><input name="kel[]" type="checkbox" value="Pembuka Roda" <?php in_array('Pembuka Roda', $o) ? print "checked" : ""; ?>>Pembuka Roda</label>
						</div>
						<div class="input-group" class="checkbox">
							<label><input name="kel[]" type="checkbox" value="Lampu Senter" <?php in_array('Lampu Senter', $o) ? print "checked" : ""; ?>>Lampu Senter</label>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-success" type="submit" name="edit">
							Save
						</button>
						<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
							Cancel
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php
}

?>