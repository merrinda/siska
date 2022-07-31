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
					<div class="susuntombol" style="text-align:center!important;">
						<button onclick="location.href='<?= $base_url ?>/admin/report/1';" class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARIS</p>
							<p class="tombol-l2">Kartu Istri</p>
						</button>
						<button onclick="location.href='<?= $base_url ?>/admin/report/2';" class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARSU</p>
							<p class="tombol-l2">Kartu Suami</p>
						</button>
						<button onclick="location.href='<?= $base_url ?>/admin/report/3';" class="btn btn-lg btn-warning tmbl-menu">
							<p class="tombol-l1">KARPEG</p>
							<p class="tombol-l2">Kartu Pegawai</p>
						</button>
					</div>
					<button onclick="location.href='<?= $base_url ?>/admin/report/cetak_laporan/?';" class="btn btn-lg btn-info">
					Laporan Keseluruhan
					</button>
					<div style="margin: 35px;padding:10px;">
						<h3>SILAHKAN PILIH SALAH SATU MENU LAPORAN DIATAS!</h3>
					</div>