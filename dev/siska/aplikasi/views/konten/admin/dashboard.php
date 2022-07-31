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
					<!--
					<div class="susuntombol" style="text-align:center!important;">
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARIS</p>
							<p class="tombol-l2">Kartu Istri</p>
						</button>
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARSU</p>
							<p class="tombol-l2">Kartu Suami</p>
						</button>
						<button class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARPEG</p>
							<p class="tombol-l2">Kartu Pegawai</p>
						</button>
					</div>
					-->
					<div style="margin: 35px;padding:10px;">
						<h3>INFORMASI</h3>
					</div>
					<div class="susuninfo" style="">
						<button class="btn btn-warning tmbl-dash col-3">
							<div class="row">
								<div class="col-md-8">
									<h5 class="text-dark">KARIS</h5>
									<h3 class="text-dark"><?= cek_hitung_usulan('1')->num_rows; ?></h3>
								</div>
								<div class="col-md-4">
									<h1 class="text-dark"><i class="fa fa-pie-chart"></i></h1>
								</div>
							</div>
						</button>
						<button class="btn btn-warning tmbl-dash col-3">
							<div class="row">
								<div class="col-md-8">
									<h5 class="text-dark">KARSU</h5>
									<h3 class="text-dark"><?= cek_hitung_usulan('2')->num_rows; ?></h3>
								</div>
								<div class="col-md-4">
									<h1 class="text-dark"><i class="fa fa-pie-chart"></i></h1>
								</div>
							</div>
						</button>
						<button class="btn btn-warning tmbl-dash col-3">
							<div class="row">
								<div class="col-md-8">
									<h5 class="text-dark">KARPEG</h5>
									<h3 class="text-dark"><?= cek_hitung_usulan('3')->num_rows; ?></h3>
								</div>
								<div class="col-md-4">
									<h1 class="text-dark"><i class="fa fa-pie-chart"></i></h1>
								</div>
							</div>
						</button>
					</div>
					<div class="susuninfo" style="">
						<button class="btn btn-warning tmbl-dash col-10">
							<h1 class="text-dark"><i class="fa fa-area-chart"></i></h1>
							<h5 class="text-dark">Total <?= cek_hitung_usulan('1')->num_rows + cek_hitung_usulan('2')->num_rows + cek_hitung_usulan('3')->num_rows ?> Usulan Aktif</h5>
						</button>
					</div>

					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>