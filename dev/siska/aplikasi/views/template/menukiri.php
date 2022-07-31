<?php
$nip = $_SESSION['nip'];
$nama = $_SESSION['nama'];
?>	
			<div class="col-md-4 first-column hidden-mobile no-printme">
				<div class="bege-kiri bulat">
					<br>
					<div style="margin: 10px;">
						<img style="width:40%;margin:15px;background-color:white;" class="" src="<?= $base_url ?>/assets/image/profil2.png"/>
						<hr class="garismenu">
						<h6><?= $nama ?></h6>
						<h6>NIP. <?= $nip ?></h6>
						<hr class="garismenu">
						<ul>
							<li><a href="<?= $base_url ?>/admin"><h5><i class="fa fa-dashboard"></i> Dashboard</h5></a></li>
							<li><a href="<?= $base_url ?>/admin/verifikasi"><h5><i class="fa fa-list-alt"></i> Verifikasi</h5></a></li>
							<li><a href="<?= $base_url ?>/admin/kirim_berkas"><h5><i class="fa fa-envelope"></i> Kirim Berkas</h5></a></li>
							<li><a href="<?= $base_url ?>/admin/download_berkas"><h5><i class="fa fa-download"></i> Download Berkas</h5></a></li>
							<li><a href="<?= $base_url ?>/admin/surat_pengantar"><h5><i class="fa fa-print"></i> Surat Pengantar</h5></a></li>
							<li><a href="<?= $base_url ?>/admin/report"><h5><i class="fa fa-line-chart"></i> Report</h5></a></li>
						</ul>
						<hr class="garismenu">
						<ul>
							<!--<li><a href="#home"><h6><i class="fa fa-gears"></i> Setting</h6></a></li>-->
							<li><a href="<?= $base_url ?>/logout"><h6><i class="fa fa-sign-out"></i> Logout</h6></a></li>
						</ul>
						<br>
					</div>
				</div>
			</div>