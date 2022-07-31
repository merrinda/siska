<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$l = $base_url.'/user/usul/status/'.$id_usul;

$syrt = syarat($jenis_kartu);
$doks = dokumen($id_usul);
foreach($doks as $d){
	//var_dump($d);
}

if($dt_usul['hilang'] == '1'){
	$hlg = '<h4 align="center">Usul Kehilangan</h4>';
} else {
	$hlg = '';
}

if($dt_usul['statuskawin'] == '1'){
	$stk = '<option value="1">Perkawinan Pertama</option>';
} else {
	$stk = '<option value="2">Perkawinan Kedua atau selanjutnya</option>';
}
$tgtgskpn = $tgtgpmlk = '';
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	//$tmtcp = $nokarpeg = $nosk = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = '';
	$pmlk = $tgpmlk = 'readonly';
	$sembunyi = '';
	$sembunyi2 = 'style="display:none;"';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly>
			'.$stk.'
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$pmlk = $tgpmlk = 'readonly';
	$sembunyi = '';
	$sembunyi2 = 'style="display:none;"';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly>
			'.$stk.'
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg = $nosk = $tgskpn = '';
	$pmlk = $tgpmlk = 'readonly style="background:black;"';
	$sembunyi = 'style="display:none;"';
	$sembunyi2 = '';
	$jandaduda = '
	<div class="row mb-3" style="display:none;">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="background:black;color:black;"></label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly style="background:black;">
			<option value=""></option>
		</select>
    </div>
	</div>
	';
}

$kel = $dt_usul['jk'];
if($kel == '1'){
	$jk = '<option value="1">Laki-Laki</option>';
} else {
	$jk = '<option value="2">Perempuan</option>';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Review usulan <?= $kartu ?> untuk NIP. <?= $dt_usul['nip'] ?></h4>
<?= $hlg ?>
<br><br>
<form>
  <div class="row mb-3">
    <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNIP" name="nip" value="<?= $dt_usul['nip'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $dt_usul['nama'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="tglhr" value="<?= $dt_usul['tgl_lhr'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenkel" readonly>
			<?= $jk; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Usul</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenis" required>
			<?= $o; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">TMT CPNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tmtcp" name="tmtcp" value="<?= $dt_usul['tmt_cpns'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi2 ?>>
    <label for="inputUnker" class="col-sm-2 col-form-label">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="noskpn" value="<?= $dt_usul['no_sk_pns'] ?>" <?= $nosk ?> readonly>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi2 ?>>
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTglNkh" name="tgskpn" value="<?= $dt_usul['tgl_sk_pns'] ?>" <?= $tgskpn ?> readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="karpeg" value="<?= $dt_usul['karpeg'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi ?>>
    <label for="inputUnker" class="col-sm-2 col-form-label">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="namapemilik" value="<?= $dt_usul['nama_pemilik'] ?>" <?= $pmlk ?> readonly>
    </div>
  </div>
  <div class="row mb-3" <?= $sembunyi ?>>
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTglNkh" name="tglpemilik" value="<?= $dt_usul['tgl_lhr_pemilik'] ?>" <?= $tgpmlk ?> readonly>
    </div>
  </div>
  <?= $jandaduda ?>
  <div class="row mb-3">
    <label for="inputPasangan" class="col-sm-2 col-form-label">No. HP Aktif</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPasangan" name="nohp" value="<?= $dt_usul['no_hp'] ?>" readonly>
    </div>
  </div>
  <br><br>
</form>
<center>
<h5>Kelengkapan Dokumen</h5>
<br><br>
<?php
$doc_count = 0;
$hitungperbaikan = $hitungsetuju = 0;
foreach($syrt as $s){
	?>
<p>
	<button type="button" class="btn btn-success col-8" data-bs-toggle="modal" data-bs-target="#xdokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>"><?= $s['nama_dok'] ?></button>
	<?php
		$stat_dok = cek_syarat($id_usul,$s['kode_dok']);
		//var_dump($stat_dok);
		if($stat_dok->num_rows > 0){
			$doc_count++;
		}
		if($stat_dok->num_rows == 0){
		?>
			<button type="button" class="btn btn-secondary col-3" data-bs-toggle="modal" data-bs-target="#xtampildokumenModal" data-bs-dok="dokumen1" data-bs-ndok="dokumen Pertama">Belum diupload</button>
		<?php
		} else {
			foreach($stat_dok as $stdok){
				$statusdok = $stdok['status'];
				if($statusdok == '3'){
					$hitungperbaikan++;
				} else 
				if($statusdok == '2'){
					$hitungsetuju++;
				}
				//var_dump($stdok);
				if($statusdok == '1'){
				?>
					<button type="button" class="btn btn-success col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-iddok="<?= $stdok['id_dok'] ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-ldok="<?= $stdok['alamat_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Sudah diupload</button>
				<?php
				} else 
				if($statusdok == '2'){
				?>
					<button type="button" class="btn btn-info col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-iddok="<?= $stdok['id_dok'] ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-ldok="<?= $stdok['alamat_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Dokumen Disetujui</button>
				<?php
				} else
				if($statusdok == '4'){
				?>
					<button type="button" class="btn btn-success col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-iddok="<?= $stdok['id_dok'] ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-ldok="<?= $stdok['alamat_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Sudah Diperbaiki</button>
				<?php
				} else {
				?>
					<button type="button" class="btn btn-warning col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-iddok="<?= $stdok['id_dok'] ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-ldok="<?= $stdok['alamat_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Perbaikan Dokumen</button>
				<?php
				}
			}
		}
	?>
</p>
	<?php
}
?>
<hr>

</center>

<div class="modal fade" id="tampildokumenModal" tabindex="-1" aria-labelledby="tampildokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampil Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<p><input type='checkbox' onchange='verdokperbaikan(this);'> Perbaikan Dokumen</p>
		<div id="perb" style="display:none;">
		<form id="formperbaikan" method="post" action="<?= $verdok; ?>">
		<p>Alasan Perbaikan : </p>
		<p><input type="hidden" name="iddok" id="kiddok" readonly></p>
		<p><input type="hidden" name="status" value="3" readonly></p>
		<textarea name="alasan" id="alasan" style="width:100%" disabled></textarea>
		</form>
		<form id="formsetuju" method="post" action="<?= $verdok; ?>">
		<p><input type="hidden" name="iddok" id="kiddok2" readonly></p>
		<p><input type="hidden" name="status" value="2"></p>
		</form>
		<br>
		</div>
		<iframe id="dokumenasli" src="" width="100%" height="100%" frameborder="0" allowfullscreen webkitallowfullscreen></iframe>
		<center><img id="gambar" src="" height="100%"></center>
      </div>
      <div class="modal-footer">
		<input form="formsetuju" id="tombol_setuju" type="submit" class="btn btn-primary" value="Terima Dokumen">
		<input form="formperbaikan" id="tombol_perbaikan" type="submit" class="btn btn-primary" value="Perbaikan Dokumen" disabled>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="perbaikan" tabindex="-1" aria-labelledby="perbaikanModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan Perbaikan Usulan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		  <form id="update_status_kembalikan" action="<?= $a; ?>" method="post">
			<p>Jelaskan Alasan Perbaikan : </p>
			<input type="hidden" name="id" value="<?= $id_usul ?>" readonly>
			<input type="hidden" name="nip" value="<?= $dt_usul['nip'] ?>" readonly>
			<input type="hidden" name="status" value="8" readonly>
			<textarea name="alasan" id="alasan_usul" style="width:100%"></textarea>
		  </form>
      </div>
      <div class="modal-footer">
		<input form="update_status_kembalikan" type="submit" class="btn btn-warning" value="Kembalikan Dokumen">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<br><br>


<script>
var tampildokModal = document.getElementById('tampildokumenModal')
tampildokModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var id_dok = button.getAttribute('data-bs-iddok');
  var iddok = button.getAttribute('data-bs-dok');
  var ndok = button.getAttribute('data-bs-ndok');
  var ldok = button.getAttribute('data-bs-ldok');
  var format = button.getAttribute('data-bs-fdok');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = tampildokModal.querySelector('.modal-title');
  var modalBodyRec = tampildokModal.querySelector('.modal-body #recipient-name');
  var kiddok = tampildokModal.querySelector('.modal-body #kiddok');
  var kiddok2 = tampildokModal.querySelector('.modal-body #kiddok2');
  var iddokumen = tampildokModal.querySelector('.modal-body #aididok');
  var lokdokumen = tampildokModal.querySelector('.modal-body #lokasi');
  var lokasidokumen = tampildokModal.querySelector('.modal-body #dokumenasli');
  var lokasigambar = tampildokModal.querySelector('.modal-body #gambar');
  
  kiddok.value = id_dok;
  kiddok2.value = id_dok;

  modalTitle.textContent = 'Tampilan dokumen untuk ' + ndok;
  //modalBodyRec.value = iddok;
  //iddokumen.value = 'Tampilan dokumen untuk ' + ldok;
  if (format == 'pdf') {
	  lokasidokumen.style = 'display:block;';
	  lokasigambar.style = 'display:none;';
	  lokasidokumen.src = '<?= $base_url ?>/assets/mzlpdf/web/viewer.html?file=<?= $base_url ?>/assets' + ldok;
	  lokasigambar.src = '';
	} else {
	  lokasidokumen.src = '';
	  lokasidokumen.style = 'display:none;';
	  lokasigambar.style = 'display:block;';
	  lokasigambar.src = '<?= $base_url ?>/assets' + ldok;
	}
  //lokasidokumen.src = '<?= $base_url ?>/assets/mzlpdf/web/viewer.html?file=<?= $base_url ?>/assets' + ldok;
})
</script>

<script>
var perbaikan = document.getElementById('perbaikan')
perbaikan.addEventListener('show.bs.modal', function (event) {
	document.getElementById("alasan_usul").required = true;
})
</script>

<script>
function verdokperbaikan(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("tombol_perbaikan").removeAttribute("disabled");
		document.getElementById("tombol_setuju").setAttribute("disabled", "disabled");
		document.getElementById("alasan").removeAttribute("disabled");
		document.getElementById("alasan").required = true;
		document.getElementById("perb").style.display = "block";
		//alert('check');
    }else{
        //document.getElementById("submit").setAttribute("disabled", "disabled");
		//alert('uncheck');
		document.getElementById("tombol_perbaikan").setAttribute("disabled", "disabled");
		document.getElementById("tombol_setuju").removeAttribute("disabled");
		document.getElementById("alasan").setAttribute("disabled", "disabled");
		document.getElementById("alasan").required = false;
		document.getElementById("perb").style.display = "none";
   }
}
</script>


<?php
$hitungan = $doc_count - ($hitungperbaikan + $hitungsetuju);
if($hitungperbaikan > 0){
	$tmbl_setuju = 'disabled';
	$tmbl_perbaikan = '';
} else {
	if($hitungan > 0){
		$tmbl_setuju = 'disabled';
		$tmbl_perbaikan = 'disabled';
	} else {
		$tmbl_setuju = '';
		$tmbl_perbaikan = '';
	}
}


?>


<p align="right">Tombol akan berfungsi setelah selesai di verifikasi</p>
<!--<h4>total dok = <?= $doc_count; ?>, total perbaikan = <?= $hitungperbaikan; ?>, total setuju =<?= $hitungsetuju; ?><h4>-->
<form id="update_status" action="<?= $a; ?>" method="post">
<input type="hidden" name="id" value="<?= $id_usul ?>">
<input type="hidden" name="status" value="9">
<table width="100%">
	<tr>
		<td width="60%"></td>
		<td width="40%">
			<input type="hidden" name="nip" value="<?= $dt_usul['nip'] ?>" readonly>
			<input type="text" class="form-control datepicker" id="tgselesai" name="tgselesai" placeholder="Pilih tanggal selesai" required>
			<input type="text" class="form-control" id="pengambilan" name="pengambilan" placeholder="Nomor Pengambilan" required>
		</td>
	</tr>
</table>
</form>
<p align="right">
<!--<button class="btn btn-warning" onclick="location.href='<?= $base_url.'/user/usulperbaikan/'.$id_usul ?>';">Kembalikan Dokumen</button>-->
<button id="tbkembalikan" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#perbaikan" <?= $tmbl_perbaikan ?>>Kembalikan Usulan</button>
<input id="tbsetujui" form="update_status" type="submit" class="btn btn-primary" value="Berkas Selesai" <?= $tmbl_setuju ?>>
</p>

<!--
<p align="right">
<button class="btn btn-warning" onclick="location.href='<?= $base_url.'/user/usulperbaikan/'.$id_usul ?>';">Perbaiki usulan</button>
<button class="btn btn-danger" onclick="location.href='<?= $l ?>';">Benar, Kirim usulan saya</button>
</p>
-->
</div>
</div>
<br><br>

