<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$ulang = $base_url.'/user/usul/'.$jenis_kartu;
$hilang = $base_url.'/user/usul_hilang/'.$id_usul;

if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$ulang.'\';">Usul Ulang</button></p>
				<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$hilang.'\';">Usul Kehilangan</button></p>';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$ulang.'\';">Usul Ulang</button></p>
				<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$hilang.'\';">Usul Kehilangan</button></p>';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/review/'.$jenis_kartu;
	$button = '<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$hilang.'\';">Usul Kehilangan</button></p>';
}

$status = $dt_usul['status'];
if($status == '0'){
	$k_stat = 'Masih mengisi berkas usulan';
	$n_stat = '0%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '1'){
	$k_stat = 'Berkas dikirim untuk verifikasi admin BKPSDM';
	$n_stat = '16%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '2'){
	$k_stat = 'Berkas diterima oleh admin BKPSDM';
	$n_stat = '32%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '3'){
	$k_stat = 'Perbaikan Berkas';
	$n_stat = '48%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '4'){
	$k_stat = 'Berkas dikirim ke BKN';
	$n_stat = '64%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '5'){
	$k_stat = 'Berkas dikembalikan oleh BKN [Perbaikan Berkas]';
	$n_stat = '80%';
	$icon = '<h1><i class="fa fa-refresh fa-spin"></i></h1>';
} else
if($status == '6'){
	$k_stat = 'Berkas usulan selesai';
	$n_stat = '100%';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
} else
if($status == '7'){
	$k_stat = 'Dokumen sudah diambil';
	$n_stat = '100%';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Status Usulan <?= $kartu ?> Selesai</h4>
<br><br>

<center>
<h4><?= $k_stat ?></h4>
<?= $icon ?>
<div class="progress col-8">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $n_stat ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br><br>
<p><button type="button" class="btn btn-primary" onclick="location.href='<?= $ulang ?>';">Usul Ulang</button></p>
<p><button type="button" class="btn btn-primary" onclick="location.href='<?= $hilang ?>';">Usul Kehilangan</button></p>
</center>



</div>
</div>
<br><br>

