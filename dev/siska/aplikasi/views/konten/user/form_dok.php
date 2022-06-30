<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$hilang = $dt_usul['hilang'];
if($hilang == '1'){
	$l = $base_url.'/user/usul/dok_hilang/'.$id_usul;
} else {
	$l = $base_url.'/user/usul/review/'.$id_usul;
}

if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	//$l = $base_url.'/user/usul/review/'.$id_usul;
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	//$l = $base_url.'/user/usul/review/'.$id_usul;
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	//$l = $base_url.'/user/usul/review/'.$id_usul;
}
if($dt_usul['statuskawin'] == '1'){
	$kwn = null;
} else {
	$kwn = '5';
}

$syrt = syarat($jenis_kartu,$kwn);
foreach($syrt as $s){
	//var_dump($s);
}

if(isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
	$pesan = 'GAGAL';
	if(strpos($message, $pesan) !== false){
		$clor = 'danger';
	} else {
		$clor = 'success';
	}
	$alert = 'alert';
    unset($_SESSION['flash_message']);
    //echo $message;
} else {
	$message = '';
	$alert = '';
	$alrt = 'display:none;';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Upload dokumen persyaratan <?= $kartu ?>!</h4>
<br><br>

<center>
<div class="<?= $alert; ?> alert-<?= $clor; ?>" role="alert" style="<?= $alrt; ?>">
	<?= $message; ?>
</div>
<?php
foreach($syrt as $s){
	?>
<p>
	<button type="button" class="btn btn-success col-8" data-bs-toggle="modal" data-bs-target="#dokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>" data-bs-udok="<?= $s['ukuran'] ?>"><?= $s['nama_dok'] ?></button>
	<?php
		$stat_dok = cek_syarat($id_usul,$s['kode_dok']);
		//var_dump($stat_dok);
		if($stat_dok->num_rows == 0){
		?>
			<button type="button" class="btn btn-secondary col-3" data-bs-toggle="modal" data-bs-target="#xtampildokumenModal" data-bs-dok="dokumen1" data-bs-ndok="dokumen Pertama">Belum diupload</button>
		<?php
		} else {
			foreach($stat_dok as $stdok){
				$statusdok = $stdok['status'];
				//var_dump($stdok);
				if($statusdok == '1'){
				?>
					<button type="button" class="btn btn-success col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-ldok="<?= $stdok['alamat_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Sudah diupload</button>
				<?php
				} else {
				?>
					<button type="button" class="btn btn-warning col-3" data-bs-toggle="modal" data-bs-target="#tampildokumenModal" data-bs-usul="<?= $id_usul ?>" data-bs-dok="<?= $s['kode_dok'] ?>" data-bs-ndok="<?= $s['nama_dok'] ?>" data-bs-fdok="<?= $s['format'] ?>">Perbaikan Dokumen</button>
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

<div class="modal fade" id="dokumenModal" tabindex="-1" aria-labelledby="dokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formupload" action="<?= $a; ?>" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            
            <input type="hidden" class="form-control" id="id_usul" name="id_usul">
          </div>
		  <div class="mb-3">
            
            <input type="text" class="form-control" id="recipient-name" name="kode_dok">
          </div>
		  <div class="mb-3">
            
            <input type="hidden" class="form-control" id="aididok">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Pilih file : </label>
            <input type="file" class="form-control" name="dok" required="required">
			<p id="formatfile" style="color: red"></p>
			<p id="ukuranfile" style="color: red"></p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" form="formupload" class="btn btn-primary" value="Upload Dokumen" />
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tampildokumenModal" tabindex="-1" aria-labelledby="tampildokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampil Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<iframe id="dokumenasli" src="" width="100%" height="100%" frameborder="0" allowfullscreen webkitallowfullscreen></iframe>
		<center><img id="gambar" src="" height="100%"></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<br><br>
<script>
var exampleModal = document.getElementById('dokumenModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var idusul = button.getAttribute('data-bs-usul');
  var iddok = button.getAttribute('data-bs-dok');
  var recipient = button.getAttribute('data-bs-ndok');
  var format = button.getAttribute('data-bs-fdok');
  var ukuran = button.getAttribute('data-bs-udok');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title');
  var modalBodyRec = exampleModal.querySelector('.modal-body #recipient-name');
  var idusulan = exampleModal.querySelector('.modal-body #id_usul');
  var iddokumen = exampleModal.querySelector('.modal-body #aididok');
  var fdok = exampleModal.querySelector('.modal-body #formatfile');
  var udok = exampleModal.querySelector('.modal-body #ukuranfile');

  modalTitle.textContent = 'Upload dokumen untuk ' + recipient;
  modalBodyRec.value = iddok;
  idusulan.value = idusul;
  iddokumen.value = 'Upload dokumen untuk ' + iddok;
  fdok.innerText = 'Format yang diperbolehkan adalah *.' + format;
  udok.innerText = 'Ukuran maksimal adalah ' + ukuran + 'MB';
})
</script>

<script>
var tampildokModal = document.getElementById('tampildokumenModal')
tampildokModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
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
  var iddokumen = tampildokModal.querySelector('.modal-body #aididok');
  var lokdokumen = tampildokModal.querySelector('.modal-body #lokasi');
  var lokasidokumen = tampildokModal.querySelector('.modal-body #dokumenasli');
  var lokasigambar = tampildokModal.querySelector('.modal-body #gambar');

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




<p align="right">
<button class="btn btn-danger" onclick="location.href='<?= $l ?>';">Selanjutnya</button>
</p>
</div>
</div>
<br><br>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>