<?php
$nip = $_SESSION['nip'];
$nama = $_SESSION['nama'];
?>			
			<div class="col-md-4 first-column hidden-mobile">
				<div class="bege-kiri bulat">
					<br>
					<div style="margin: 10px;">
						<img style="width:40%;margin:15px" class="" src="https://bkdpsdm.banjarkab.go.id/a/assets/images/pentol.jpg"/>
						<hr class="garismenu">
						<h6><?= $nama ?></h6>
						<h6>NIP. <?= $nip ?></h6>
						<hr class="garismenu">
						<ul>
							<li><a href="<?= $base_url ?>/user"><h5><i class="fa fa-dashboard"></i> Dashboard</h5></a></li>
						</ul>
						<hr class="garismenu">
						<ul>
							<li><a href="#home"><h6><i class="fa fa-gears"></i> Setting</h6></a></li>
							<li><a href="<?= $base_url ?>/logout"><h6><i class="fa fa-sign-out"></i> Logout</h6></a></li>
						</ul>
						<br>
					</div>
				</div>
			</div>