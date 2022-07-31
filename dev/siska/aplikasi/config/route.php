<?php
//require_once('config.php');
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die( header( 'location: '.$base_url.'/error' ) );
}
include $fungsi_inc.'global.php';
include $fungsi_inc.'query.php';
$arraynotif = ceknotifikasi();
if($arraynotif != null){
	$notif_count = $arraynotif[0];
	$link_notif = $arraynotif[1];
} else {
	$notif_count = '';
	$link_notif = '';
}

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
			$judul = 'Berkas Masuk';
			$statber = array('1');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Masuk';
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
			$judul = 'Berkas Diterima';
			$statber = array('2');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Diterima';
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
			$judul = 'Berkas Disetujui';
			$statber = array('3');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Disetujui';
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
			$judul = 'Berkas Perbaikan';
			$statber = array('4');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Perbaikan';
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
			$judul = 'Berkas Selesai Perbaikan';
			$statber = array('5');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Selesai Perbaikan';
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
			$judul = 'Berkas Dikirim';
			$statber = array('7');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Dikirim';
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan_dikirim';
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
			$judul = 'Berkas Selesai';
			$statber = array('9');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Selesai';
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan_dikirim';
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
			$judul = 'Berkas BTL [BKN]';
			$statber = array('8');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan_dikirim';
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
			$judul = 'Berkas Diambil';
			$statber = array('10');
			$cekberkas = cekberkasusulan($statber);
			$jdl = 'Berkas Diambil';
			$temp = 'temp_adm';
			$konten = 'admin/berkas_usulan_dikirim';
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
			$f = 'admin';
			$sf = 'ver_usul';
			$a = $fungsi.$f.'.php?x='.$sf;
			$sf_verdok = 'ver_dok';
			$verdok = $fungsi.$f.'.php?x='.$sf_verdok;
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
		case $base_url.'/admin/hasil_verifikasi_bkn/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$f = 'admin';
			$sf = 'ver_usul_bkn';
			$a = $fungsi.$f.'.php?x='.$sf;
			$sf_verdok = 'ver_dok';
			$verdok = $fungsi.$f.'.php?x='.$sf_verdok;
			$temp = 'temp_adm';
			$konten = 'admin/verifikasi_kelengkapan_bkn';
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
			$konten = 'admin/berkas_download';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/surat_pengantar' :
			ceklogout();
			$statber = array('6');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/surat_pengantar';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/surat_pengantar_karis' :
			ceklogout();
			$statber = array('6');
			$jusul = array('1');
			$cekberkas = cekberkasusulan_surat($statber,$jusul);
			$f = 'admin';
			$sf = 'batch_cetak_surat';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_adm';
			$konten = 'admin/pilih_cetak_surat';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/surat_pengantar_karsu' :
			ceklogout();
			$statber = array('6');
			$jusul = array('2');
			$cekberkas = cekberkasusulan_surat($statber,$jusul);
			$f = 'admin';
			$sf = 'batch_cetak_surat';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_adm';
			$konten = 'admin/pilih_cetak_surat';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/surat_pengantar_karpeg' :
			ceklogout();
			$statber = array('6');
			$jusul = array('3');
			$cekberkas = cekberkasusulan_surat($statber,$jusul);
			$f = 'admin';
			$sf = 'batch_cetak_surat';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_adm';
			$konten = 'admin/pilih_cetak_surat';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/cetak_surat_pengantar/'.$id :
			ceklogout();
			//echo $request;
			$nosurat = $id;
			$statber = array('7');
			$cekberkas = ceknosurat($statber,$nosurat);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_surat_pengantar';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/cetak_ulang_surat_pengantar' :
			ceklogout();
			//echo $request;
			$nosurat = $id;
			$statber = array('7');
			$cekberkas = ceksurat($statber);
			$temp = 'temp_adm';
			$konten = 'admin/pilih_cetak_ulang';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/cetak_ulang_surat_pengantar/'.$id :
			ceklogout();
			//echo $request;
			$nosurat = $id;
			//echo $nosurat;
			$statber = array('7');
			$cekberkas = ceknosurat($statber,$nosurat);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_surat_pengantar';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/detail_pengambilan_kartu/'.$id :
			ceklogout();
			//echo $request;
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$f = 'admin';
			$sf = 'detail_pengambilan';
			$a = $fungsi.$f.'.php?x='.$sf;
			$temp = 'temp_adm';
			$konten = 'admin/detail_pengambilan';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report' :
			ceklogout();
			$statber = array('6');
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/pilih_report';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/'.$id :
			ceklogout();
			$statber = array('6');
			$cekberkas = cekberkasusulan($statber);
			$id_kartu = $id;
			$temp = 'temp_adm';
			$konten = 'admin/report';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/cetak_report/'.$id :
			ceklogout();
			$statber = array('6');
			$cekberkas = cekberkasusulan($statber);
			$jenisreport = $id;
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_lapbul/'.$id :
			ceklogout();
			//echo $request;
			$j_u = $_GET['id'];
			$j_l = '01';
			$statber = array('10');
			if(isset($_GET['f1'])){
				$f1 = $_GET['f1'];
			} else {
				$f1 = '0';
			}
			if(isset($_GET['f2'])){
				$f2 = $_GET['f2'];
			} else {
				$f2 = '0';
			}
			$filter = "AND SUBSTRING(tgl_selesai, 1, 7) = '".$f1."-".$f2."'";
			//echo $filter;
			$cekberkas = cekberkasreport($statber,$j_u,$filter);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_laptah/'.$id :
			ceklogout();
			//echo $request;
			$j_u = $_GET['id'];
			$j_l = '02';
			$statber = array('10');
			if(isset($_GET['f'])){
				$f = $_GET['f'];
			} else {
				$f = '0';
			}
			$filter = "AND SUBSTRING(tgl_selesai, 1, 4) = '".$f."'";
			//echo $filter;
			$cekberkas = cekberkasreport($statber,$j_u,$filter);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_lapum/'.$id :
			ceklogout();
			//echo $request;
			$j_u = $_GET['id'];
			$j_l = '03';
			$statber = array('1','2','3','4','5','6','7','8','9','10');
			if(isset($_GET['f'])){
				$f = $_GET['f'];
			} else {
				$f = '0';
			}
			$filter = "";
			//echo $filter;
			$cekberkas = cekberkasreport($statber,$j_u,$filter);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_lapproses/'.$id :
			ceklogout();
			//echo $request;
			$j_u = $_GET['id'];
			$j_l = '04';
			$statber = array('1','2','3','4','5','6','7','8','9');
			if(isset($_GET['f'])){
				$f = $_GET['f'];
			} else {
				$f = '0';
			}
			$filter = "";
			//echo $filter;
			$cekberkas = cekberkasreport($statber,$j_u,$filter);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_lapselesai/'.$id :
			ceklogout();
			//echo $request;
			$j_u = $_GET['id'];
			$j_l = '05';
			$statber = array('10');
			if(isset($_GET['f'])){
				$f = $_GET['f'];
			} else {
				$f = '0';
			}
			$filter = "";
			//echo $filter;
			$cekberkas = cekberkasreport($statber,$j_u,$filter);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/report/cetak_laporan/'.$id :
			ceklogout();
			//echo $request;
			if(isset($_GET['id'])){
				$j_u = $_GET['id'];
			} else {
				$j_u = '';
			}
			$j_l = '06';
			$statber = array('1','2','3','4','5','6','7','8','9','10');
			if(isset($_GET['f'])){
				$f = $_GET['f'];
			} else {
				$f = '0';
			}
			$filter = "";
			//echo $filter;
			$cekberkas = cekberkasusulan($statber);
			$temp = 'temp_adm';
			$konten = 'admin/cetak_report_tabel';
			$cu = cekuser($request);
			if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/admin/notifikasi' :
			ceklogout();
			$notif = cek_notif('admin');
			dismiss_notif('admin');
			$temp = 'temp_adm';
			$konten = 'notifikasi';
			$cu = cekuser($request);
            if($cu == 1){
				require $template.$temp.'.php';
			} else {
				$konten = 'kembali';
				require $template.'temp.php';
			}
            break;
		case $base_url.'/user/notifikasi' :
			ceklogout();
			//session_start();
			$notif = cek_notif($_SESSION['nip']);
			dismiss_notif($_SESSION['nip']);
			$temp = 'temp_usr';
			$konten = 'notifikasi';
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
			//echo $jenis_kartu;
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
			$hilang = '';
			$f = 'user';
			$sf = 'simpanusulperbaikan';
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
		case $base_url.'/user/usul_perbaikan_data/'.$id :
			ceklogout();
			$id_usul = $id;
			$data_usul = usulan($id_usul);
			$hilang = '';
			$f = 'user';
			$sf = 'simpan_perbaikan_usul';
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
			$sf = 'simpan_usul_hilang';
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