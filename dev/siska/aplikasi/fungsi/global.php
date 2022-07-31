<?php
session_start();
$userdb = array(
    array(
        'uid' => 'admin',
        'name' => 'Sandra Shush',
        'status' => '0'
    ),
    array(
        'uid' => 'user',
        'name' => 'Stefanie Mcmohn',
        'status' => '1'
    ),
    array(
        'uid' => 'other',
        'name' => 'Michael',
        'status' => '1'
    )
);

function ceklogin(){
	global $base_url;
	if(isset($_SESSION['username'])){
		if($_SESSION['username'] == 'admin'){
			header("Location: ".$base_url."/admin");
			exit();
		} else {
			header("Location: ".$base_url."/user");
			exit();
		}
	}
}

function ceklogout(){
	global $base_url;
	if(!isset($_SESSION['username'])){
		header("Location: ".$base_url);
		exit();
	}
}

function cekuser($req){
	if(isset($_SESSION['akses'])){
	if (strpos($req, $_SESSION['akses']) !== false) { 
		return 1;
	} else {
		return 0;
	}
	}
}

function cekkartu($id){
	$nip = $_SESSION['nip'];
	$jns = $id;
	$statlist = array('0','1','2','3','4','5','6','7','8','9','10');
	$status = implode(',', $statlist);
	$kuer = "SELECT * FROM tb_usul WHERE nip='$nip' and jenis_usulan='$jns' and status in ($status) ORDER BY id_usulan DESC";
	$cek1 = kueri($kuer);
	return $cek1;
}

function cekkartu_selesai($id){
	$nip = $_SESSION['nip'];
	$jns = $id;
	$statlist = array('7');
	$status = implode(',', $statlist);
	$kuer = "SELECT * FROM tb_usul WHERE nip='$nip' and jenis_usulan='$jns' and status in ($status)";
	$cek1 = kueri($kuer);
	return $cek1;
}

function logout(){
	global $base_url;
	session_start();
	session_destroy();
	header('Location: '.$base_url);
}

function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['uid'] === $id) {
           return $key;
       }
   }
   return null;
}

function cekusul(){
	global $base_url;
	global $userdb;
	$cari = searchForId('admin', $userdb);
	return $cari;
}

function ceknotifikasi(){
	if(isset($_SESSION['username'])){
	if($_SESSION['username'] == 'admin'){
		$notif_count = notif_count('admin')->num_rows;
		$link_notif = '/admin/notifikasi';
	} else {
		$notif_count = notif_count($_SESSION['nip'])->num_rows;
		$link_notif = '/user/notifikasi';
	}
	return array($notif_count,$link_notif);
}
}

function notif_count($tujuan){
	$statlist = array('1');
	$status = implode(',', $statlist);
	$kuer = "SELECT * FROM tb_notif WHERE status in ($status) AND tujuan = '$tujuan'";
	$ada = kueri($kuer);
	return $ada;
}