<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$perbaiki = $base_url.'/user/usul_perbaikan_data/'.$id_usul;
$ulang = $base_url.'/user/usul/'.$jenis_kartu;
$hilang = $base_url.'/user/usul_hilang/'.$id_usul;
$cetak_nota = $base_url.'/user/cetaknota/'.$id_usul;

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
if($status == '9'){
	$k_stat = 'Berkas usulan selesai';
	$n_stat = '100%';
	$button = '<p><button type="button" class="btn btn-primary" onclick="printDiv();">Cetak Kartu Pengambilan</button></p>';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
	$note = 'Pengambilan dapat dilakukan di layanan satu pintu BKPSDM pada jam kerja dengan membawa kartu pengambilan.';
	$cetak_kartu = '
<div style="display:none;">
<div id="cetak_kartu" style="background-color:white;color:black;">
	<center>
		<table width="300px" style="border:1px solid black">
			<tr style="background-color:yellow;border:1px solid black">
				<td align="center" style="border:1px solid black"><p style="font-size:18">Nomor Kartu Pengambilan</p></td>
			</tr>
			<tr style="border:1px solid black">
				<td align="center"><h1>'.$dt_usul['ket'].'</h1></td>
			</tr>
			<tr style="background-color:yellow;border:1px solid black">
				<td align="center" style="border:1px solid black">
					<p>
					<span style="font-size:18">'.$kartu.'</span><br>
					<span style="font-size:10">BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA KAB. BANJAR</span>
					</p>
				</td>
			</tr>
		</table>
</center>
</div>
</div>
';
} else
if($status == '10'){
	$k_stat = 'Dokumen sudah diambil';
	$n_stat = '100%';
	$button = '';
	$icon = '<h1><i class="fa fa-check-circle"></i></h1>';
	$note = $dt_usul['ket'];
	$cetak_kartu = '
<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$perbaiki.'\';">Usul Perbaikan Data</button></p>
<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$ulang.'\';">Usul Ulang</button></p>
<p><button type="button" class="btn btn-primary" onclick="location.href=\''.$hilang.'\';">Usul Kehilangan</button></p>';
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
<p><?= $button ?></p>
<p><?= $note ?></p>
<?= $cetak_kartu ?>
<br><br>
</center>



</div>
</div>
<br><br>

<script>
function printDiv() {
	var divContents = document.getElementById("cetak_kartu").innerHTML;
	var a = window.open('', '', 'height='+ screen.height +', width=1000'+ screen.width);
	a.document.write('<html>');
	a.document.write('<head>');
	a.document.write('<style>h4{font-size:24}</style>');
	a.document.write('</head>');
	a.document.write('<body>');
	a.document.write(divContents);
	a.document.write('</body></html>');
	a.document.close();
	a.print();
}
</script>