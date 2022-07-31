	<div class="topnav show-mobile">
		<a href="#home" class="active">MENU</a>
		<hr class="garismenu">
		<div id="myLinks">
			<a href="<?= $base_url ?>/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
			<a href="<?= $base_url ?>/admin/verifikasi"><i class="fa fa-list-alt"></i> Verifikasi</a>
			<a href="<?= $base_url ?>/admin/kirim_berkas"><i class="fa fa-list-alt"></i> Kirim Berkas</a>
			<a href="<?= $base_url ?>/admin/download_berkas"><i class="fa fa-list-alt"></i> Download Berkas</a>
			<a href="<?= $base_url ?>/admin/surat_pengantar"><i class="fa fa-print"></i> Surat Pengantar</a>
			<a href="<?= $base_url ?>/admin/report"><i class="fa fa-line-chart"></i> Report</a>
			<a href="<?= $base_url.$link_notif ?>">
				<span><i class="fa fa-bell"></i> Notifikasi</span>
				<?php
				if($notif_count > 0){
					echo '<span class="tanda">'.$notif_count.'</span>';
				}
				?>
			</a>
			<hr class="garismenu">
			<!--<a href="#setting"><i class="fa fa-gears"></i> Setting</a>-->
			<a href="<?= $base_url ?>/logout"><i class="fa fa-sign-out"></i> Logout</a>
		</div>
		<a href="javascript:void(0);" class="icon notification" onclick="myFunction()">
			<span><i class="fa fa-bars"></i></span>
			<?php
			if($notif_count > 0){
				echo '<span class="badge"><i class="fa fa-bell"></i></span>';
			}
			?>
		</a>
	</div>