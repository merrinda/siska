<?php
//$no_surat = str_replace("garing","/",$nosurat);
//$no_surat = str_replace("spc"," ",$no_surat);
//var_dump($cekberkas);
/*
$xcb = 0;
foreach($cekberkas as $cb){
	$xcb++;
	$ju = $cb['jenis_usulan'];
	$tgl = $cb['tgl_surat'];
	if($xcb == 1){
		$namapertama = $cb['nama'];
		$nippertama = $cb['nip'];
	}
}
echo '<br>';
$jumlah = $cekberkas->num_rows;
if($jumlah > 1){
	$jdata = '
			<table width="490px" style="margin-bottom:0px;">
				<tr>
					<td>Dkk ('.$jumlah.' Orang) berkas terlampir</td>
				</tr>
			</table>
	';
	$lampiran = '1 Berkas';
} else {
	$jdata = '';
	$lampiran = '-';
}
$ddaata = array($ju);
*/
/*
foreach($ddaata as $ddd){
	echo $ddd.'<br>';
}

if (in_array("1", $ddaata))
  {
	$c_karis = 1;
  }
  else
  {
	$c_karis = 0;
  }

if (in_array("2", $ddaata))
  {
	$c_karsu = 1;
  }
  else
  {
	$c_karsu = 0;
  }

if (in_array("3", $ddaata))
  {
	$c_karpeg = 1;
  }
  else
  {
	$c_karpeg = 0;
  }
//echo '<br>';
if($c_karis == 1 && $c_karsu == 0 && $c_karpeg == 0){
	//echo 'Karis';
	$js = 'Karis';
	$jsl = 'Kartu Istri (KARIS)';
} else 
if($c_karis == 0 && $c_karsu == 1 && $c_karpeg == 0){
	//echo 'Karsu';
	$js = 'Karsu';
	$jsl = 'Kartu Suami (KARSU)';
} else 
if($c_karis == 0 && $c_karsu == 0 && $c_karpeg == 1){
	//echo 'Karpeg';
	$js = 'Karpeg';
	$jsl = 'Kartu Pegawai (KARPEG)';
} else 
if($c_karis == 1 && $c_karsu == 1 && $c_karpeg == 0){
	//echo 'Karis dan Karsu';
	$js = 'Karis dan Karsu';
	$jsl = 'Kartu Istri (KARIS) dan Kartu Suami (KARSU)';
} else 
if($c_karis == 1 && $c_karsu == 0 && $c_karpeg == 1){
	//echo 'Karis dan Karpeg';
	$js = 'Karis dan Karpeg';
	$jsl = 'Kartu Istri (KARIS) dan Kartu Pegawai (KARPEG)';
} else 
if($c_karis == 0 && $c_karsu == 1 && $c_karpeg == 1){
	//echo 'Karsu dan Karpeg';
	$js = 'Karsu dan Karpeg';
	$jsl = 'Kartu Suami (KARSU) dan Kartu Pegawai (KARPEG)';
} else 
if($c_karis == 0 && $c_karsu == 0 && $c_karpeg == 0){
	//echo ' ';
	$js = ' ';
	$jsl = ' ';
} else 
if($c_karis == 1 && $c_karsu == 1 && $c_karpeg == 1){
	//echo 'Karis, Karsu dan Karpeg';
	$js = 'Karis, Karsu dan Karpeg';
	$jsl = 'Kartu Istri (KARIS), Kartu Suami (KARSU) dan Kartu Pegawai (KARPEG)';
}
*/
if(isset($_GET['id'])){
if($_GET['id'] == '1'){
	$krt = 'KARIS';
} else
if($_GET['id'] == '2'){
	$krt = 'KARSU';
} else
if($_GET['id'] == '3'){
	$krt = 'KARPEG';
} else {
	$krt = '';
}
}
if($j_l == '01'){
	$jns_lap = 'LAPORAN BULANAN '.$krt;
	$form = '
	<table width="150px"><form class="">
	<input type="hidden" name="id" value="'.$_GET['id'].'">
	<input type="hidden" name="jl" value="01">
	<input type="text" name="f1" placeholder="Masukkan Tahun" required>
	<select name="f2" class="col-4" required>
	<option value="">Pilih Bulan</option>
	<option value="01">Januari</option>
	<option value="02">Februari</option>
	<option value="03">Maret</option>
	<option value="04">April</option>
	<option value="05">Mei</option>
	<option value="06">Juni</option>
	<option value="07">Juli</option>
	<option value="08">Agustus</option>
	<option value="09">September</option>
	<option value="10">Oktober</option>
	<option value="11">Nopember</option>
	<option value="12">Desember</option>
	</select>
	<input type="submit" class="btn btn-sm btn-info" value="Tampilkan">
	</form>
	</table>
	';
} else
if($j_l == '02'){
	$jns_lap = 'LAPORAN TAHUNAN '.$krt;
	$form = '
	<table width="150px"><form class="">
	<input type="hidden" name="id" value="'.$_GET['id'].'">
	<input type="hidden" name="jl" value="02">
	<input type="text" name="f" placeholder="Masukkan Tahun" required>
	<input type="submit" class="btn btn-sm btn-info" value="Tampilkan">
	</form>
	</table>
	';
} else
if($j_l == '03'){
	$jns_lap = 'LAPORAN UMUM '.$krt;
	$form = '';
} else
if($j_l == '04'){
	$jns_lap = 'LAPORAN BERKAS '.$krt.' DALAM PROSES';
	$form = '';
} else
if($j_l == '05'){
	$jns_lap = 'LAPORAN BERKAS '.$krt.' SELESAI';
	$form = '';
} else 
if($j_l == '06'){
	$jns_lap = 'LAPORAN SELURUH BERKAS USULAN';
	$form = '';
} else {
	$jns_lap = '';
	$form = '';
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
					<div id="tinggal" style="margin: 0px;padding:0px;">
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
					<?= $form ?>
					<button onclick="printDiv()">Cetak</button>
					<div id="section-to-print" style="background-color:white;font-color:black;">
					<br><br>
					<center style="color:black;font-family: 'Times New Roman', Times, serif;">
					<table width="630px" style="margin-bottom:0px;">
					<tr>
					<td width="80px"><image width="100%" src="<?= $base_url ?>/assets/image/logos.png"></td>
					<td align="center">
						<h4 style="margin-left:20px;margin-bottom:0px;line-height:1;">PEMERINTAH KABUPATEN BANJAR<br>BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</h4>
						<p style="margin-left:20px;font-size:11px;margin-bottom:0px;">
						Jl. Menteri Empat No. 26 RT 12/04 Kel. Sei Paring Telepon/Fax. (0511) 4720527 Martapura 70613<br>
						www.bkdpsdm.banjarkab.go.id; email : bdkpsdm@banjarkab.go.id
						</p>
					</td>
					</tr>
					</table>
					<hr style="width:630px;border:2px solid black;padding:0px;">
					<h3><?= $jns_lap ?></h3>
					<table width="630px" style="margin-bottom:0px;border:1px solid;border-collapse:collapse;">
						<tr style="border:1px solid;border-collapse:collapse;text-align:center;">
							<td style="border:1px solid;border-collapse:collapse;">No</td>
							<td style="border:1px solid;border-collapse:collapse;">Nama</td>
							<td style="border:1px solid;border-collapse:collapse;">NIP</td>
							<td style="border:1px solid;border-collapse:collapse;">Jenis Usul</td>
							<td style="border:1px solid;border-collapse:collapse;">Tanggal Usul</td>
							<td style="border:1px solid;border-collapse:collapse;">Tanggal Selesai</td>
						</tr>
						<?php
						$no = 0;
						foreach($cekberkas as $vb){
							$no++;
							if($vb['jenis_usulan'] == '1'){
								$jusul = 'Karis';
							} else 
							if($vb['jenis_usulan'] == '2'){
								$jusul = 'Karsu';
							} else 
							if($vb['jenis_usulan'] == '3'){
								$jusul = 'Karpeg';
							}
							if($vb['perbaikan'] == '1'){
								$perbaikan = ' (Perbaikan)';
							} else {
								$perbaikan = '';
							}
							if($vb['hilang'] == '1'){
								$hilang = ' (Kehilangan)';
							} else {
								$hilang = '';
							}
						?>
						<tr>
							<td style="border:1px solid;border-collapse:collapse;text-align:center;"><?= $no ?></td>
							<td style="border:1px solid;border-collapse:collapse;"><?= $vb['nama'].$perbaikan.$hilang ?></td>
							<td style="border:1px solid;border-collapse:collapse;"><?= $vb['nip'] ?></td>
							<td style="border:1px solid;border-collapse:collapse;"><?= $jusul ?></td>
							<td style="border:1px solid;border-collapse:collapse;"><?= $vb['tgl_usul'] ?></td>
							<td style="border:1px solid;border-collapse:collapse;"><?= $vb['tgl_selesai'] ?></td>
						</tr>
						<?php
						}
						?>
					</table>
					<br><br>
					</center>
					</div>
					<div style="margin: 35px;padding:10px;">
					</div>

<script>
        function printDiv() {
            var divContents = document.getElementById("section-to-print").innerHTML;
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