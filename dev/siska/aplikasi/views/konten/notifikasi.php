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
						<h4>Halaman Notifikasi</h4>
						<center>
						<br><br>
						<table width="90%" style="margin-bottom:0px;">
						<?php 
						foreach($notif as $ntf){
							if($ntf['status'] == '1'){
								$notifaktif = 'font-weight:bold;';
								$warna = 'color:aqua;';
							} else {
								$notifaktif = '';
								$warna = '';
							}
						?>
						<tr style="text-align:left;<?= $notifaktif.$warna ?>">
							<td width="20%" style="vertical-align:top;">[<?= $ntf['tanggal'] ?>]</td>
							<td width="80%" style="vertical-align:top;"><?= $ntf['pesan'] ?> [<a href="<?= $base_url.$ntf['link'] ?>">Cek notifikasi</a>]</td>
						</tr>
						<?php
						}
						?>
						</table>
						</center>
					</div>
					<div style="margin: 35px;padding:10px;">
						<h3></h3>
					</div>