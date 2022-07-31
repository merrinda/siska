<?php
$no_surat = str_replace("garing","/",$nosurat);
$no_surat = str_replace("spc"," ",$no_surat);
$ddaata = array('1','2','3');
/*
foreach($ddaata as $ddd){
	echo $ddd.'<br>';
}
*/
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
	
?>
					<div id="tinggal" style="margin: 0px;padding:0px;">
						<div class="col-md-12 notif">
							<a href="#notif" class="icon notification2 hidden-mobile">
								<span><i class="fa fa-bell"></i></span>
								<span class="badge2">3</span>
							</a>
						</div>
					</div>
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
					<table width="630px" style="margin-bottom:0px;">
						<tr>
							<td>Nomor</td>
							<td>:</td>
							<!--<td>KP.11.04.5/      /BKPSDM</td>-->
							<td><?= $no_surat ?></td>
							<td align="right">Martapura, 17 Juni 2022</td>
						</tr>
						<tr>
							<td>Sifat</td>
							<td>:</td>
							<td>Penting</td>
							<td></td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>:</td>
							<td>-</td>
							<td></td>
						</tr>
						<tr>
							<td>Hal</td>
							<td>:</td>
							<td>Usul <?= $js ?> PNS Kab. Banjar</td>
							<td></td>
						</tr>
					</table>
					<table width="630px" style="margin-bottom:0px;">
						<tr>
							<td>
								<br>
								Kepada<br>
								Yth. Kepala Kantor Regional VIII BKN Banjarmasin<br>
								Up. Bidang Mutasi dan Status Kepegawaian <br>
								di-<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banjarbaru
							</td>
						</tr>
					</table>
					<table width="630px" style="margin-bottom:0px;">
						<tr>
							<td>
								<br><br>
								<p style="text-indent:70px;text-align:justify;">
									Bersama ini disampaikan usul permintaan pembuatan <?= $jsl ?> Pegawai Negeri Sipil di Lingkungan Pemerintah Kabupaten Banjar dengan rincian sebanyak 2 Orang atas nama sebagai berikut :
								</p>
							</td>
						</tr>
					</table>
					<br>
					<table width="490px" style="margin-bottom:0px;">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>SAHMADI </td>
						</tr>
						<tr>
							<td>NIP</td>
							<td>:</td>
							<td>196304081994031012</td>
						</tr>
					</table>
					<table width="490px" style="margin-bottom:0px;">
						<tr>
							<td>Dkk (2 Orang) berkas terlampir</td>
						</tr>
					</table>
					<table width="630px" style="margin-bottom:0px;">
						<tr>
							<td>
								<br><br>
								<p style="text-indent:70px;text-align:justify;">
									Demikian disampaikan, agar mendapat penyelesaian sebagaimana mestinya, atas kerja samanya diucapkan terima kasih.
								</p>
							</td>
						</tr>
					</table>
					<br>
					<table width="630px" style="margin-bottom:0px;page-break-after: always;">
						<tr>
							<td width="60%"></td>
							<td width="40%">
									Kepala BKPSDM Kabupaten Banjar<br><br><br><br><br>
									Ir. Hj. IDA PRESSY, MT<br>
									Pembina Utama Muda (IV/c)<br>
									NIP. 196206061992032007
							</td>
						</tr>
					</table>
					<br><br>
					<table width="630px" style="margin-bottom:0px;">
						<tr>
							<td align="center">
								<h5>DAFTAR NAMA USUL PENGAJUAN <?= strtoupper($jsl) ?></h5>
							</td>
						</tr>
					</table>
					<br>
					<table width="630px" style="margin-bottom:0px;border:1px solid;border-collapse:collapse;">
						<tr style="border:1px solid;border-collapse:collapse;text-align:center;">
							<td style="border:1px solid;border-collapse:collapse;">No</td>
							<td style="border:1px solid;border-collapse:collapse;">Nama</td>
							<td style="border:1px solid;border-collapse:collapse;">NIP</td>
							<td style="border:1px solid;border-collapse:collapse;">Jenis</td>
						</tr>
						<tr>
							<td style="border:1px solid;border-collapse:collapse;text-align:center;">1</td>
							<td style="border:1px solid;border-collapse:collapse;">SAHMADI</td>
							<td style="border:1px solid;border-collapse:collapse;">196304081994031012</td>
							<td style="border:1px solid;border-collapse:collapse;">Karis</td>
						</tr>
						<tr>
							<td style="border:1px solid;border-collapse:collapse;text-align:center;">2</td>
							<td style="border:1px solid;border-collapse:collapse;">ERWANTI TJAHYANI</td>
							<td style="border:1px solid;border-collapse:collapse;">196209141985032010</td>
							<td style="border:1px solid;border-collapse:collapse;">Karsu</td>
						</tr>
					</table>
					<br><br><br>
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