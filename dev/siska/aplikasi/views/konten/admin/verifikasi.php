<style>
.hitungjumlahberkas{
	position: relative;
	top: 0px;
	right: -20px;
	padding: 5px 10px;
	border-radius: 50%;
	background-color: orange;
	color: green;
	z-index: 1;
}
</style>
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
						<h3>Daftar Berkas</h3>
					</div>
					
	<input id="myInput" type="text" placeholder="Cari..">
<br><br>

<table class="table table-dark table-striped">
  <thead>
  <tr>
    <th>Status Berkas</th>
  </tr>
  </thead>
  <tbody id="myTable">
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_masuk'"><span>Berkas Masuk</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('1'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_diterima'"><span>Berkas Diterima</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('2'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_disetujui'"><span>Berkas Disetujui</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('3'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_perbaikan'"><span>Berkas Perbaikan</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('4'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_selesai_perbaikan'"><span>Berkas Selesai Perbaikan</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('5'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_dikirim'"><span>Berkas Dikirim</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('6'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_selesai'"><span>Berkas Selesai</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('7'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_btl'"><span>Berkas BTL BKN</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('8'))->num_rows; ?></span></button></td>
  </tr>
  <tr>
	<td><button class="btn btn-info col-7" onclick="location.href='<?= $base_url ?>/admin/berkas_diambil'"><span>Berkas Diambil</span><span class="hitungjumlahberkas"><?= cekberkasusulan(array('9'))->num_rows; ?></span></button></td>
  </tr>
  </tbody>
</table>

					

					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>