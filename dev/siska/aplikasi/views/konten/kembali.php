<?php

if(isset($_SESSION['username'])){
	if($_SESSION['username'] == 'admin'){
		$l = $base_url.'/admin';
	} else {
		$l = $base_url.'/user';
	}
} else {
	$l = $base_url;
}

?>
<center>
	<br>
	<button  onclick="location.href='<?= $l ?>';" class="btn btn-lg btn-warning" style="width:20%;">Kembali</button>
	<br><br>
</center>