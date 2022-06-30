<?php
//require('..\config\config.php');
require($_SERVER['DOCUMENT_ROOT'].'/dev/siska/aplikasi/config/config.php');
if(isset($_GET['x'])){
    if(function_exists($_GET['x'])) {    
        $_GET['x']();
    } else {
		echo 'function not found';
	}
}


function login() {
	global $base_url;

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

	$kuer = "SELECT * FROM user WHERE username='$username'";
	$cekcek = kueri($kuer);
	if($cekcek->num_rows > 0){
		$row = mysqli_fetch_assoc($cekcek);
		if(md5($password) == $row['password']){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['nip'] = $row['nip'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['akses'] = $row['hak_akses'];
			
			ceklogin();
		} else {
			session_start();
			$_SESSION['flash_message'] = "Password Salah!";
			header("Location: ".$base_url."/login");
			exit();
		}
	} else {
		session_start();
		$_SESSION['flash_message'] = "User tidak ditemukan!";
		header("Location: ".$base_url."/login");
		exit();
	}
}

function ceklogin(){
	global $base_url;
	session_start();
	if(isset($_SESSION['akses'])){
		if($_SESSION['akses'] == 'admin'){
			header("Location: ".$base_url."/admin");
			exit();
		} else {
			header("Location: ".$base_url."/user");
			exit();
		}
	}
}

function kueri($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);
	return $result;
}