<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$lanjut = $base_url.'/user/usulperbaikan/'.$id_usul;
$selesai = $base_url.'/user/usul/detail_pengambilan/'.$id_usul;
$ambil = $base_url.'/user/usul/detail_pengambilan/'.$id_usul;
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
}

$status = $dt_usul['status'];
if($status == '0'){
	$k_stat = 'Masih mengisi berkas usulan';
	$n_stat = '0%';
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$lanjut.'\';">Lanjutkan Pengisian</button></p>';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = '';
} else
if($status == '1'){
	$k_stat = 'Berkas dikirim untuk verifikasi admin BKPSDM';
	$n_stat = '16%';
	$button = '';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = '';
} else
if($status == '2'){
	$k_stat = 'Berkas diterima oleh admin BKPSDM';
	$n_stat = '32%';
	$button = '';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = '';
} else
if($status == '3'){
	$k_stat = 'Perbaikan Berkas';
	$n_stat = '48%';
	$button = '';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = 'Terdapat kesalahan pada data atau syarat yang anda upload';
} else
if($status == '4'){
	$k_stat = 'Berkas dikirim ke BKN';
	$n_stat = '64%';
	$button = '';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = '';
} else
if($status == '5'){
	$k_stat = 'Berkas dikembalikan oleh BKN [Perbaikan Berkas]';
	$n_stat = '80%';
	$button = '';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
	$note = '';
} else
if($status == '6'){
	$k_stat = 'Berkas usulan selesai';
	$n_stat = '100%';
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$selesai.'\';">Detail Pengambilan</button></p>';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
	$note = '';
} else
if($status == '7'){
	$k_stat = 'Dokumen sudah diambil';
	$n_stat = '100%';
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$ambil.'\';">Detail Pengambilan</button></p>';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
	$note = '';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Status Usulan <?= $kartu ?></h4>
<br><br>

<center>
<h4><?= $k_stat ?></h4>
<?= $icon ?>
<div class="progress col-8">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $n_stat ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p><?= $button ?></p>
<p><?= $note ?></p>
</center>

<div class="modal fade" id="dokumenModal" tabindex="-1" aria-labelledby="dokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">id_dokumen:</label>
            <input type="text" class="form-control" id="aididok">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Upload Dokumen</button>
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
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">id_dokumen:</label>
            <input type="text" class="form-control" id="aididok">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Upload Dokumen</button>
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
  var iddok = button.getAttribute('data-bs-dok');
  var recipient = button.getAttribute('data-bs-ndok');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title');
  var modalBodyRec = exampleModal.querySelector('.modal-body #recipient-name');
  var iddokumen = exampleModal.querySelector('.modal-body #aididok');

  modalTitle.textContent = 'Upload dokumen untuk ' + recipient;
  modalBodyRec.value = iddok;
  iddokumen.value = 'Upload dokumen untuk ' + iddok;
})
</script>

<script>
var tampildokModal = document.getElementById('tampildokumenModal')
tampildokModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var iddok = button.getAttribute('data-bs-dok');
  var recipient = button.getAttribute('data-bs-ndok');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title');
  var modalBodyRec = exampleModal.querySelector('.modal-body #recipient-name');
  var iddokumen = exampleModal.querySelector('.modal-body #aididok');

  modalTitle.textContent = 'Upload dokumen untuk ' + recipient;
  modalBodyRec.value = iddok;
  iddokumen.value = 'Upload dokumen untuk ' + iddok;
})
</script>

</div>
</div>
<br><br>

