<?php
//require_once('config.php');
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die( header( 'location: '.$base_url.'/error' ) );
}
include $fungsi_inc.'global.php';
include $fungsi_inc.'query.php';


    $request = $_SERVER['REQUEST_URI'];
	//$cu = cekuser($request);
	$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
	$id = end($request_uri);
    switch ($request) {
        case $base_url.'/' :
			ceklogin();
			$temp = 'temp';
			$konten = 'home';
            require $template.$temp.'.php';
            break;
		case $base_url.'/login' :
			ceklogin();
			$temp = 'temp';
			$konten = 'login';
			$f = 'login';
			$sf = 'login';
			$a = $fungsi.$f.'.php?x='.$sf;
            require $template.$temp.'.php';
            break;
		case $base_url.'/admin' :
			ceklogout();
			$temp = 'temp_adm';
			$konten = 'admin/dashboard';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/verifikasi' :
			ceklogout();
			$temp = 'temp_adm';
			$konten = 'admin/verifikasi';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_masuk' :
			ceklogout();
			$statber = array('1');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_diterima' :
			ceklogout();
			$statber = array('2');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_disetujui' :
			ceklogout();
			$statber = array('3');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_perbaikan' :
			ceklogout();
			$statber = array('4');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_selesai_perbaikan' :
			ceklogout();
			$statber = array('5');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_dikirim' :
			ceklogout();
			$statber = array('7');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_selesai' :
			ceklogout();
			$statber = array('8');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_btl' :
			ceklogout();
			$statber = array('9');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/berkas_diambil' :
			ceklogout();
			$statber = array('10');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/verifikasi_kelengkapan/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$temp = 'temp_adm';
			$konten = 'admin/verifikasi_kelengkapan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/kirim_berkas' :
			ceklogout();
			$statber = array('3');
			$cekberkas = cekberkasusulan($statber);
			$f = 'admin';
			$sf = 'batch_kirim_berkas';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_adm';
			$konten = 'admin/berkas_kirim';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/download_berkas' :
			ceklogout();
			$statber = array('6');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user' :
			ceklogout();
			$temp = 'temp_usr';
			$konten = 'user/dashboard';
			$f = 'login';
			$sf = 'login';
			$a = $fungsi.$f.'.php?x='.$sf;
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
        case $base_url.'/about' :
			echo 'TENTANG';
            break;
		case $base_url.'/about/'.$id :
			$temp = 'temp_adm';
			$idx = end($request_uri);
			$konten = 'dashboard2';
            require $template.$temp.'.php';
            break;
        case $base_url.'/contact' :
			//echo 'KONTAK';
			//header('Location: '.$base_url.'/error');
            break;
		case $base_url.'/user/cekkartu' :
			ceklogout();
			$status = cekusul();
			$temp = 'temp_usr';
			$konten = 'user/usul_karis_cek';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/cekkartu/'.$id :
			ceklogout();
			$jenis_kartu = $id;
			echo $jenis_kartu;
			$status = cekusul();
			$temp = 'temp_usr';
			$konten = 'user/cek_kartu';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/'.$id :
			ceklogout();
			$jenis_kartu = $id;
			$f = 'user';
			$sf = 'simpanusul';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_usul';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/perbaikan/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$f = 'user';
			$sf = 'simpanperbaikanusul';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_usul_perbaikan';
			$cu = cekuser($request);
			$perbaikan = 1;
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usulperbaikan/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$hilang = '';
			$f = 'user';
			$sf = 'simpanperbaikanusul';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_perbaikan';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul_hilang/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$hilang = '1';
			$f = 'user';
			$sf = 'simpanperbaikanusul';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_perbaikan';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/dok/'.$id :
			//echo 'DOKUMEN USUL KARIS';
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$f = 'user';
			$sf = 'upload_dok';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_dok';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/dok_hilang/'.$id :
			//echo 'DOKUMEN USUL KARIS';
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$f = 'user';
			$sf = 'upload_dok';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/form_dok_hilang';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/detail_pengambilan/'.$id :
			ceklogout();
			$jenis_kartu = $id;
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$temp = 'temp_usr';
			$konten = 'user/status_selesai';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/review/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			//$jenis_kartu = $id;
			$f = 'user';
			$sf = 'kirim_berkas';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_usr';
			$konten = 'user/review';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/usul/kirim' :
			echo 'KIRIM BERKAS USULAN';
            break;
		case $base_url.'/user/usul/status/'.$id :
			ceklogout();
			$jenis_kartu = $id;
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$temp = 'temp_usr';
			$konten = 'user/status';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/karsu' :
			ceklogout();
			$temp = 'temp_usr';
			$konten = 'user/usul_karis_cek';
			$f = 'login';
			$sf = 'login';
			$a = $fungsi.$f.'.php?x='.$sf;
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/karsu/usul' :
			echo 'USUL KARSU';
            break;
		case $base_url.'/logout' :
			logout();
			break;
		case $base_url.'/error' :
			$temp = 'temp';
			$konten = 'error';
			$status = '404';
            require $template.$temp.'.php';
            break;
        default:
            http_response_code(404);
            //echo "404";
			//echo '<br>';
			//echo $request;
			$temp = 'temp';
			$konten = 'error';
			$status = '404';
            require $template.$temp.'.php';
            break;
    }