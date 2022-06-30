<?php
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
	session_start();
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
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: ".$base_url);
		exit();
	}
}

function cekuser($req){
	if(isset($_SESSION['username'])){
	if (strpos($req, $_SESSION['username']) !== false) { 
		return 1;
	} else {
		return 0;
	}
	}
}

function cekkartu($id){
	$nip = $_SESSION['nip'];
	$jns = $id;
	$statlist = array('0','1','2','3','4','5','6','7');
	$status = implode(',', $statlist);
	$kuer = "SELECT * FROM tb_usul WHERE nip='$nip' and jenis_usulan='$jns' and status in ($status)";
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
