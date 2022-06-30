<?php
$ck = cekkartu($jenis_kartu);
$usul = mysqli_fetch_assoc($ck);
var_dump($ck->num_rows);
	if($ck->num_rows < 1){
		$l = $base_url.'/user/usul/'.$jenis_kartu;
		$l2 = $base_url.'/user/usul/perbaikan/'.$jenis_kartu;
		$button = '
		<p><button onclick="location.href=\''.$l.'\';" class="btn btn-primary" style="width:20%;">Buat Pengajuan</button></p>
		<p><button onclick="location.href=\''.$l2.'\';" class="btn btn-primary" style="width:20%;">Perbaikan</button></p>
		';
	} else {
		$selesai = cekkartu_selesai($jenis_kartu);
		var_dump($selesai->num_rows);
		if($selesai->num_rows > 0){
			$l = $base_url.'/user/usul/status/'.$usul['id_usulan'];
			$lp = $base_url.'/user/usul/perbaikan/'.$usul['id_usulan'];
			$button = '
						<p><button onclick="location.href=\''.$l.'\';" class="btn btn-primary" style="width:20%;">Cek Progress</button></p>
						<p><button onclick="location.href=\''.$lp.'\';" class="btn btn-primary" style="width:20%;">Perbaikan Data</button></p>
					';
		} else {
			$l = $base_url.'/user/usul/status/'.$usul['id_usulan'];
			$button = '
						<button onclick="location.href=\''.$l.'\';" class="btn btn-primary" style="width:20%;">Cek Progress</button>
					';
		}
	}
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
}
?>
<center>
	<h2>Belum memiliki <?= $kartu ?>?</h2>
	<br>
	<?= $button ?>
	<br><br>
</center>