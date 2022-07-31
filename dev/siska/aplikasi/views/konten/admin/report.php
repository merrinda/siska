<?php
if($id_kartu == '1'){
	$jeniskartu = 'Karis';
} else
if($id_kartu == '2'){
	$jeniskartu = 'Karsu';
} else
if($id_kartu == '3'){
	$jeniskartu = 'Karpeg';
} else {
	$jeniskartu = '-';
}
?>
<style>
.hitungjumlahberkas{
	position: relative;
	top: 0px;
	right: -20px;
	padding: 5px 10px;
	border-radius: 50%;
	background-color: orange;
	color: green;
	z-index: 0;
}

.bhnd{
	z-index: -1;
}
</style>
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
						<h3>Laporan</h3>
					</div>
					
	<input id="myInput" type="text" placeholder="Cari..">
<br><br>

<table class="table table-dark table-striped">
  <thead>
  <tr>
    <th>Daftar Laporan <?= $jeniskartu ?></th>
  </tr>
  </thead>
  <tbody id="myTable">
  <tr>
	<td><button class="btn btn-info col-7 bhnd" onclick="location.href='<?= $base_url ?>/admin/report/cetak_lapbul/?id=<?= $id_kartu ?>'"><span>Laporan Bulanan</span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/report/cetak_laptah/?id=<?= $id_kartu ?>'"><span>Laporan Tahunan</span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/report/cetak_lapum/?id=<?= $id_kartu ?>'"><span>Laporan Umum</span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/report/cetak_lapproses/?id=<?= $id_kartu ?>'"><span>Laporan Berkas Dalam Proses</span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/report/cetak_lapselesai/?id=<?= $id_kartu ?>'"><span>Laporan Berkas Selesai</span></button></td>
  </tr>
  </tbody>
</table>

					

					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>