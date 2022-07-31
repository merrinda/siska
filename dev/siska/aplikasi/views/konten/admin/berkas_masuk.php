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
						<h3>Berkas Masuk</h3>
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
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>john@example.com</td>
	<td><button class="btn btn-info">Detail</button><button class="btn btn-primary">Verifikasi</button></td>
  </tr>
  <tr>
    <td>Mary</td>
    <td>Moe</td>
    <td>mary@mail.com</td>
	<td><button class="btn btn-info">Detail</button><button class="btn btn-primary">Verifikasi</button></td>
  </tr>
  <tr>
    <td>July</td>
    <td>Dooley</td>
    <td>july@greatstuff.com</td>
	<td><button class="btn btn-info">Detail</button><button class="btn btn-primary">Verifikasi</button></td>
  </tr>
  <tr>
    <td>Anja</td>
    <td>Ravendale</td>
    <td>a_r@test.com</td>
	<td><button class="btn btn-info">Detail</button><button class="btn btn-primary">Verifikasi</button></td>
  </tr>
  </tbody>
</table>

					

					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>