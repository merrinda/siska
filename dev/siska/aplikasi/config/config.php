<?php
$base_url = '/dev/siska';
/* DATABASE */

$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";
 
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

/* DATABASE */
$template = __DIR__ . '/../../aplikasi/views/template/';
$menu_mobile = __DIR__ . '/../../aplikasi/views/template/menumobile.php';
$menu_kiri = __DIR__ . '/../../aplikasi/views/template/menukiri.php';
$menu_mobile_usr = __DIR__ . '/../../aplikasi/views/template/menumobile_usr.php';
$menu_kiri_usr = __DIR__ . '/../../aplikasi/views/template/menukiri_usr.php';
$cont = __DIR__ . '/../../aplikasi/views/konten/';
$fungsi = $base_url.'/aplikasi/fungsi/';
$fungsi_inc = __DIR__ . '/../../aplikasi/fungsi/';
$root = $_SERVER['DOCUMENT_ROOT'].$base_url;

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die( header( 'location: '.$base_url.'/error' ) );
}
