<?php
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
					<div style="margin: 0px;padding:0px;">
						<div class="col-md-12 notif">
							<a href="#notif" class="icon notification2 hidden-mobile">
								<span><i class="fa fa-bell"></i></span>
								<span class="badge2">3</span>
							</a>
						</div>
					</div>
					<style>
					.card {display:inline-block;margin:0px;}
					</style>

					<div style="margin: 35px;padding:10px;">
						<h3>Download Berkas</h3>
					</div>
					<div class="<?= $alert; ?> alert-<?= $clor; ?>" role="alert" style="<?= $alrt; ?>">
						<?= $message; ?>
					</div>
					
	<input id="myInput" type="text" placeholder="Search..">
<br><br>

<table class="table table-dark table-striped">
  <thead>
  <tr>
    <th>NIP</th>
    <th>Nama</th>
    <th>Jenis Usulan</th>
	<th>Aksi</th>
  </tr>
  </thead>
  <tbody id="myTable">
<?php 
	//var_dump($cekberkas);
	foreach($cekberkas as $cb){
		//var_dump($cb);
		if($cb['jenis_usulan'] == '1'){
			$ju = 'KARIS';
		} else
		if($cb['jenis_usulan'] == '2'){
			$ju = 'KARSU';
		} else
		if($cb['jenis_usulan'] == '3'){
			$ju = 'KARPEG';
		} else {
			$ju = 'Blank';
		}
		?>
		<tr>
			<td><?= $cb['nip'] ?></td>
			<td><?= $cb['nama'] ?></td>
			<td><?= $ju ?></td>
			<td>
				<button class="btn btn-info" 
					data-bs-toggle="modal"
					data-bs-target="#tampilberkas"
					data-bs-idusul="<?= $cb['id_usulan'] ?>"
					data-bs-nip="<?= $cb['nip'] ?>"
					data-bs-nama="<?= $cb['nama'] ?>"
					data-bs-ju="<?= $ju ?>"
					data-bs-tlhr="<?= $cb['tgl_lhr'] ?>"
					data-bs-jk="<?= $cb['jk'] ?>"
					data-bs-tmtcp="<?= $cb['tmtcp'] ?>"
					data-bs-stts="<?= $cb['status'] ?>"
					>
				Detail</button>
			</td>
		</tr>
		<?php
	}
?>
  </tbody>
</table>

					

					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>
<div class="modal fade" id="tampilberkas" tabindex="-1" aria-labelledby="tampildokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampil Berkas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<br><br>
<center>
<form class="col-9">
  <div class="row mb-3">
    <label for="inputNIP" class="col-sm-2 col-form-label" style="text-align:right;">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nip" name="nip" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label" style="text-align:right;">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tglhr" name="tglhr" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="text-align:right;">Jenis Kelamin</label>
    <div class="col-sm-10">
		<input type="text" class="form-control" id="jk" name="jk" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="text-align:right;">Jenis Usul</label>
    <div class="col-sm-10">
		<input type="text" class="form-control" id="ju" name="ju" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">TMT CPNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tmtcp" name="tmtcp" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="noskpn" name="noskpn" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tgskpn" name="tgskpn" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="karpeg" name="karpeg" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namapemilik" name="namapemilik" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tglpemilik" name="tglpemilik" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPasangan" class="col-sm-2 col-form-label" style="text-align:right;">No. HP Aktif</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nohp" name="nohp" readonly>
    </div>
  </div>
  <br><br>
</form>
</center>
      </div>
      <div class="modal-footer">
		<button id="tombolaksi" type="button" class="btn btn-info" onclick="">Temp</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
var tampildokModal = document.getElementById('tampilberkas')
tampildokModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var id_usul = button.getAttribute('data-bs-idusul');
  var nip = button.getAttribute('data-bs-nip');
  var nama = button.getAttribute('data-bs-nama');
  var tglhr = button.getAttribute('data-bs-tlhr');
  var jk = button.getAttribute('data-bs-jk');
  var ju = button.getAttribute('data-bs-ju');
  var tmtcp = button.getAttribute('data-bs-tmtcp');
  var stts = button.getAttribute('data-bs-stts');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = tampildokModal.querySelector('.modal-title');
  var knip = tampildokModal.querySelector('.modal-body #nip');
  var knama = tampildokModal.querySelector('.modal-body #nama');
  var ktglhr = tampildokModal.querySelector('.modal-body #tglhr');
  var kjk = tampildokModal.querySelector('.modal-body #jk');
  var kju = tampildokModal.querySelector('.modal-body #ju');
  
  var aksi = tampildokModal.querySelector('.modal-footer #tombolaksi');

  modalTitle.textContent = 'Detail usulan ' + ju + ' untuk pegawai dengan NIP.' + nip;
  knip.value = nip;
  knama.value = nama;
  ktglhr.value = tglhr;
  kjk.value = jk;
  kju.value = ju;
  
if (stts == '1') {
	aksi.textContent = 'Terima Berkas';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/aplikasi/fungsi/admin.php?x=terimaberkas&id='+ id_usul +'";');
} else
if (stts == '2') {
	aksi.textContent = 'Verifikasi';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/admin/verifikasi_kelengkapan/'+ id_usul +'";');
} else
if (stts == '3') {
	aksi.textContent = 'Kirim Berkas';
	aksi.setAttribute('onclick',  'alert("ini aksi Kirim Berkas");');
} else
if (stts == '4') {
	aksi.textContent = 'Cek Status';
	aksi.setAttribute('onclick',  'alert("ini aksi Cek Status");');
} else
if (stts == '5') {
	aksi.textContent = 'Verifikasi';
	aksi.setAttribute('onclick',  'alert("ini aksi Verifikasi");');
} else
if (stts == '6') {
	aksi.textContent = 'Ubah Status Berkas';
	aksi.setAttribute('onclick',  'alert("ini aksi Ubah Status");');
} else
if (stts == '7') {
	aksi.textContent = 'Cek Detail';
	aksi.setAttribute('onclick',  'alert("ini aksi Cek Detail");');
} else
if (stts == '8') {
	aksi.textContent = 'Kembalikan Berkas';
	aksi.setAttribute('onclick',  'alert("ini aksi Kembalikan Berkas");');
} else
if (stts == '9') {
	aksi.textContent = 'Cek Detail';
	aksi.setAttribute('onclick',  'alert("ini aksi Cek Detail");');
} else {
	aksi.textContent = 'Bukan Berkas Masuk';
	aksi.setAttribute('onclick',  '');
}

})
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>