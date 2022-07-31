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
							<a href="<?= $base_url.$link_notif ?>" class="icon notification2 hidden-mobile">
								<span><i class="fa fa-bell"></i></span>
								<?php
								if($notif_count > 0){
									echo '<span class="badge2">'.$notif_count.'</span>';
								}
								?>
							</a>
						</div>
					</div>
					<style>
					.card {display:inline-block;margin:0px;}
					</style>

					<div style="margin: 35px;padding:10px;">
						<h3><?= $jdl; ?></h3>
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
		if($cb['jk'] == '1'){
			$jk = 'Laki-laki';
		} else {
			$jk = 'Perempuan';
		}
		
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
		
		if($cb['statuskawin'] == '1'){
			$stkawin = 'Perkawinan Pertama';
		} else
		if($cb['statuskawin'] == '2'){
			$stkawin = 'Perkawinan Kedua atau selanjutnya';
		} else {
			$stkawin = '';
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
					data-bs-jk="<?= $jk ?>"
					data-bs-tmtcp="<?= $cb['tmt_cpns'] ?>"
					data-bs-stts="<?= $cb['status'] ?>"
					data-bs-noskpns="<?= $cb['no_sk_pns'] ?>"
					data-bs-tgskpns="<?= $cb['tgl_sk_pns'] ?>"
					data-bs-nokarpeg="<?= $cb['karpeg'] ?>"
					data-bs-pemilik="<?= $cb['nama_pemilik'] ?>"
					data-bs-tglhr_pemilik="<?= $cb['tgl_lhr_pemilik'] ?>"
					data-bs-stts_kawin="<?= $stkawin ?>"
					data-bs-hp="<?= $cb['no_hp'] ?>"
					>
				Detail</button>
				<button id="tombolhapus" type="button" class="btn btn-danger"
					data-bs-toggle="modal"
					data-bs-target="#konfirmasi"
					data-bs-idusul="<?= $cb['id_usulan'] ?>"
					>
				Hapus Usulan</button>
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
  <div class="row mb-3" id="vnip">
    <label for="inputNIP" class="col-sm-2 col-form-label" style="text-align:right;">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nip" name="nip" readonly>
	  <input type="hidden" id="idusulan" value="">
    </div>
  </div>
  <div class="row mb-3" id="vnama">
    <label for="inputNama" class="col-sm-2 col-form-label" style="text-align:right;">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vtglhr">
    <label for="inputNama" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tglhr" name="tglhr" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vjk">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="text-align:right;">Jenis Kelamin</label>
    <div class="col-sm-10">
		<input type="text" class="form-control" id="jk" name="jk" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vju">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="text-align:right;">Jenis Usul</label>
    <div class="col-sm-10">
		<input type="text" class="form-control" id="ju" name="ju" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vtmtcp">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">TMT CPNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tmtcp" name="tmtcp" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vnoskpn">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="noskpn" name="noskpn" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vtgskpn" style="">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tgskpn" name="tgskpn" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vkarpeg">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="karpeg" name="karpeg" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vnamapemilik">
    <label for="inputUnker" class="col-sm-2 col-form-label" style="text-align:right;">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namapemilik" name="namapemilik" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vtglpemilik">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tglpemilik" name="tglpemilik" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vstts_kawin">
    <label for="inputTglNkh" class="col-sm-2 col-form-label" style="text-align:right;">Status Perkawinan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="stts_kawin" name="stts_kawin" readonly>
    </div>
  </div>
  <div class="row mb-3" id="vhp">
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
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="konfirmasi" tabindex="0" aria-labelledby="tampildokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:rgba(8, 85, 64, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<br><br>
<center>
<h3>Yakin ingin menghapus berkas ini?</h3>
</center>
      </div>
      <div class="modal-footer">
		<button id="konf_ya" type="button" class="btn btn-danger" onclick="">Ya, Hapus Usulan</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
var tampildokModal = document.getElementById('tampilberkas')
tampildokModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id_usul = button.getAttribute('data-bs-idusul')
  var nip = button.getAttribute('data-bs-nip')
  var nama = button.getAttribute('data-bs-nama')
  var tglhr = button.getAttribute('data-bs-tlhr')
  var jk = button.getAttribute('data-bs-jk')
  var ju = button.getAttribute('data-bs-ju')
  var tmtcp = button.getAttribute('data-bs-tmtcp')
  var stts = button.getAttribute('data-bs-stts')
  var tmtcp = button.getAttribute('data-bs-tmtcp')
  var noskpn = button.getAttribute('data-bs-noskpns')
  var tgskpn = button.getAttribute('data-bs-tgskpns')
  var nokarpeg = button.getAttribute('data-bs-nokarpeg')
  var pemilik = button.getAttribute('data-bs-pemilik')
  var tglhr_pemilik = button.getAttribute('data-bs-tglhr_pemilik')
  var stts_kawin = button.getAttribute('data-bs-stts_kawin')
  var hp = button.getAttribute('data-bs-hp')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = tampildokModal.querySelector('.modal-title')
  var knip = tampildokModal.querySelector('.modal-body #nip')
  var kid = tampildokModal.querySelector('.modal-body #idusulan')
  var knama = tampildokModal.querySelector('.modal-body #nama')
  var ktglhr = tampildokModal.querySelector('.modal-body #tglhr')
  var kjk = tampildokModal.querySelector('.modal-body #jk')
  var kju = tampildokModal.querySelector('.modal-body #ju')
  var ktmtcp = tampildokModal.querySelector('.modal-body #tmtcp')
  var kstts_kawin = tampildokModal.querySelector('.modal-body #stts_kawin')
  var knoskpn = tampildokModal.querySelector('.modal-body #noskpn')
  var ktgskpn = tampildokModal.querySelector('.modal-body #tgskpn')
  var knokarpeg = tampildokModal.querySelector('.modal-body #karpeg')
  var kpemilik = tampildokModal.querySelector('.modal-body #namapemilik')
  var ktglhr_pemilik = tampildokModal.querySelector('.modal-body #tglpemilik')
  var khp = tampildokModal.querySelector('.modal-body #nohp')
  
  var vnip = tampildokModal.querySelector('.modal-body #vnip')
  var vnama = tampildokModal.querySelector('.modal-body #vnama')
  var vtglhr = tampildokModal.querySelector('.modal-body #vtglhr')
  var vjk = tampildokModal.querySelector('.modal-body #vjk')
  var vju = tampildokModal.querySelector('.modal-body #vju')
  var vtmtcp = tampildokModal.querySelector('.modal-body #vtmtcp')
  var vstts_kawin = tampildokModal.querySelector('.modal-body #vstts_kawin')
  var vnoskpn = tampildokModal.querySelector('.modal-body #vnoskpn')
  var vtgskpn = tampildokModal.querySelector('.modal-body #vtgskpn')
  var vnokarpeg = tampildokModal.querySelector('.modal-body #vkarpeg')
  var vpemilik = tampildokModal.querySelector('.modal-body #vnamapemilik')
  var vtglhr_pemilik = tampildokModal.querySelector('.modal-body #vtglpemilik')
  var vhp = tampildokModal.querySelector('.modal-body #vhp')
  
  var aksi = tampildokModal.querySelector('.modal-footer #tombolaksi')
  //var hapus = tampildokModal.querySelector('.modal-footer #tombolhapus')


if(ju == "KARIS" || ju == "KARSU"){
	vnip.style.display = "";
	vnama.style.display = "";
	vtglhr.style.display = "";
	vjk.style.display = "";
	vju.style.display = "";
	vtmtcp.style.display = "";
	vnoskpn.style.display = "none";
	vtgskpn.style.display = "none";
	vnokarpeg.style.display = "";
	vpemilik.style.display = "";
	vtglhr_pemilik.style.display = "";
	vstts_kawin.style.display = "";
	vhp.style.display = "";
} else if(ju == "KARPEG"){
	vnip.style.display = "";
	vnama.style.display = "";
	vtglhr.style.display = "";
	vjk.style.display = "";
	vju.style.display = "";
	vtmtcp.style.display = "";
	vnoskpn.style.display = "";
	vtgskpn.style.display = "";
	vnokarpeg.style.display = "";
	vpemilik.style.display = "none";
	vtglhr_pemilik.style.display = "none";
	vstts_kawin.style.display = "none";
	vhp.style.display = "";
}

  modalTitle.textContent = 'Detail usulan ' + ju + ' untuk pegawai dengan NIP.' + nip;
  knip.value = nip;
  kid.value = id_usul;
  knama.value = nama;
  ktglhr.value = tglhr;
  kjk.value = jk;
  kju.value = ju;
  ktmtcp.value = tmtcp;
  knoskpn.value = noskpn;
  ktgskpn.value = tgskpn;
  knokarpeg.value = nokarpeg;
  kpemilik.value = pemilik;
  ktglhr_pemilik.value = tglhr_pemilik;
  kstts_kawin.value = stts_kawin;
  khp.value = hp;
  

if (stts == '1') {
	aksi.textContent = 'Terima Berkas';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/aplikasi/fungsi/admin.php?x=terimaberkas&id='+ id_usul +'";');
} else
if (stts == '2') {
	aksi.textContent = 'Verifikasi';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/admin/verifikasi_kelengkapan/'+ id_usul +'";');
	//hapus.style.visibility = "hidden";
} else
if (stts == '3') {
	aksi.style.visibility = "hidden";
	aksi.setAttribute('onclick',  'alert("ini aksi Kirim Berkas");');
	//hapus.style.visibility = "hidden";
} else
if (stts == '4') {
	aksi.style.visibility = "hidden";
	aksi.setAttribute('onclick',  'alert("ini aksi Cek Status");');
	//hapus.style.visibility = "hidden";
} else
if (stts == '5') {
	aksi.textContent = 'Verifikasi';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/admin/verifikasi_kelengkapan/'+ id_usul +'";');
	//hapus.style.visibility = "hidden";
} else
if (stts == '6') {
	aksi.style.visibility = "hidden";
	aksi.setAttribute('onclick',  'alert("ini aksi Ubah Status");');
	//hapus.style.visibility = "hidden";
} else
if (stts == '7') {
	aksi.textContent = 'Hasil dari BKN';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/admin/hasil_verifikasi_bkn/'+ id_usul +'";');
	//hapus.style.visibility = "hidden";
} else
if (stts == '8') {
	aksi.style.visibility = "hidden";
	aksi.setAttribute('onclick',  '');
	//hapus.style.visibility = "hidden";
} else
if (stts == '9') {
	aksi.textContent = 'Detail Pengambilam';
	aksi.setAttribute('onclick',  'location.href="<?= $base_url ?>/admin/detail_pengambilan_kartu/'+ id_usul +'";');
	//hapus.style.visibility = "hidden";
} else {
	aksi.style.visibility = "hidden";
	aksi.setAttribute('onclick',  '');
	//hapus.style.visibility = "hidden";
}

})
</script>
<script>
/*
//hapus.addEventListener('click', hps)
function hps(){
	//var idusulan = document.getElementById('idusulan').value
	//document.getElementById('tampilberkas').modal('hide');
	//alert(idusulan);
	const modal1 = document.getElementById('tampilberkas');
	const modal2 = document.getElementById('konfirmasi');
    modal1.classList.remove('show');
    modal1.setAttribute('aria-hidden', 'true');
    modal1.setAttribute('style', 'display: none');
    const modalBackdrops = document.getElementsByClassName('modal-backdrop');
    document.body.removeChild(modalBackdrops[0]);
	modal2.modal('show');
}
*/
var konfirModal = document.getElementById('konfirmasi')
konfirModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id_usul = button.getAttribute('data-bs-idusul')
  var hapus = konfirModal.querySelector('.modal-footer #konf_ya')
  hapus.setAttribute('onclick',  'location.href="<?= $base_url ?>/aplikasi/fungsi/admin.php?x=hapusberkas&id='+ id_usul +'";');
})
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>