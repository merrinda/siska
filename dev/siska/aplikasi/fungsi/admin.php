<?php
//require('..\config\config.php');
require($_SERVER['DOCUMENT_ROOT'].'/dev/siska/aplikasi/config/config.php');
include 'query.php';
if(isset($_GET['x'])){
    if(function_exists($_GET['x'])) {    
        $_GET['x']();
    } else {
		echo 'function not found';
	}
}


function simpanusul(){
	global $base_url;
	//$id = $_POST['id'];
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$tgl_lhr = $_POST['tglhr'];
	$jk = $_POST['jenkel'];
	$jns_usul = $_POST['jenis'];
	$tmtcpns = $_POST['tmtcp'];
	$noskpns = $_POST['noskpn'];
	$tglskpns = $_POST['tgskpn'];
	$nokarpeg = $_POST['karpeg'];
	$nm_pemilik = $_POST['namapemilik'];
	$tglhr_pemilik = $_POST['tglpemilik'];
	$statuskawin = $_POST['statuskawin'];
	$hp = $_POST['nohp'];
	//$ket = $_POST[''];
	//$perbaikan = $_POST[''];
	
	$data = array(
		'nip'				=>	$nip,
		'nama'				=>	$nama,
		'tgl_lhr'			=>	$tgl_lhr,
		'jk'				=>	$jk,
		'jenis_usulan'		=>	$jns_usul,
		'tmt_cpns'			=>	$tmtcpns,
		'no_sk_pns'			=>	$noskpns,
		'tgl_sk_pns'		=>	$tglskpns,
		'karpeg'			=>	$nokarpeg,
		'nama_pemilik'		=>	$nm_pemilik,
		'tgl_lhr_pemilik'	=>	$tglhr_pemilik,
		'statuskawin'		=>	$statuskawin,
		'no_hp'				=>	$hp,
		'status'			=>	'0'
		);
	//var_dump($data);
	
	$q = kueri_insert('tb_usul',$data);
	if($q){
		$cek = kueri_cari('tb_usul',$data);
		$dd = mysqli_fetch_assoc($cek);
		$idusul = $dd['id_usulan'];
		if($cek > 0){
			$_SESSION['flash_message'] = "Data Berhasil Disimpan";
			header("Location: ".$base_url."/user/usul/dok/".$idusul);
			//header("Location: ".$_SERVER['HTTP_REFERER']);
			exit();
		}		
	} else {
		$_SESSION['flash_message'] = "Gagal menyimpan data";
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit();
	}
	
}

function simpanperbaikanusul(){
	global $base_url;
	$id = $_POST['id'];
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$tgl_lhr = $_POST['tglhr'];
	$jk = $_POST['jenkel'];
	$jns_usul = $_POST['jenis'];
	$tmtcpns = $_POST['tmtcp'];
	$noskpns = $_POST['noskpn'];
	$tglskpns = $_POST['tgskpn'];
	$nokarpeg = $_POST['karpeg'];
	$nm_pemilik = $_POST['namapemilik'];
	$tglhr_pemilik = $_POST['tglpemilik'];
	$statuskawin = $_POST['statuskawin'];
	$hp = $_POST['nohp'];
	$hilang = $_POST['hilang'];
	//$ket = $_POST[''];
	//$perbaikan = $_POST[''];

	
	$datacari = array(
		'id_usulan'			=>	$id
		);
	
	/*
	$data = 'nip = "'.$nip
		.'", nama = "'.$nama
		.'", unit_kerja = "'.$unker
		.'", jenis_usulan = "'.$jns_usl
		.'", tgl_nikah = "'.$tgl_nkh
		.'", nama_pasangan = "'.$nm_pasangan
		.'", status =	"0"';
	*/	
	$data = 'nip = "'.$nip
		.'", nama = "'.$nama
		.'", tgl_lhr = "'.$tgl_lhr
		.'", jk = "'.$jk
		.'", jenis_usulan = "'.$jns_usul
		.'", tmt_cpns = "'.$tmtcpns
		.'", no_sk_pns = "'.$noskpns
		.'", tgl_sk_pns = "'.$tglskpns
		.'", karpeg = "'.$nokarpeg
		.'", nama_pemilik = "'.$nm_pemilik
		.'", tgl_lhr_pemilik = "'.$tglhr_pemilik
		.'", statuskawin = "'.$statuskawin
		.'", no_hp = "'.$hp
		.'", hilang = "'.$hilang
		.'", status = "0"'
		;
		
	$kondisi = ' id_usulan = '.$id;
	$q = kueri_update('tb_usul',$data,$kondisi);
	//var_dump($q);
	
	if($q){
		$cek = kueri_cari('tb_usul',$datacari);
		$dd = mysqli_fetch_assoc($cek);
		$idusul = $dd['id_usulan'];
		if($cek > 0){
			$_SESSION['flash_message'] = "Data Berhasil Disimpan";
			header("Location: ".$base_url."/user/usul/dok/".$idusul);
			//header("Location: ".$_SERVER['HTTP_REFERER']);
			exit();
		}		
	} else {
		$_SESSION['flash_message'] = "Gagal menyimpan data";
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit();
	}
}
function hapusberkas(){
	session_start();
	$id = $_GET['id'];
	$kondisi = 'id_usulan = "'.$id.'"';
	$q_hapus = 'delete from tb_usul where '.$kondisi;
	//$q_hapus = 'update tb_usul set status = "15" where '.$kondisi;
	echo $q_hapus;
	$cek = kueri($q_hapus);
	if($cek){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "BERKAS BERHASIL DIHAPUS";
		simpan_notif($nip,'Berkasanda telah dihapus','#');
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENGHAPUS";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
}

function terimaberkas(){
	session_start();
	$id_usul = $_GET['id'];
	echo 'BERKAS DENGAN ID USUL "'.$id_usul.'" AKAN DITERIMA.';
	$dataupdate = 'status = "2"';
	$kondisi = 'id_usulan = "'.$id_usul.'"';
	$q = kueri_update('tb_usul',$dataupdate,$kondisi);
	$q_ceknip = 'select * from tb_usul where '.$kondisi;
	$cek = kueri($q_ceknip);
	foreach($cek as $c){
		$nip = $c['nip'];
		$jenis = $c['jenis_usulan'];
	}
	$p = data_pesan('2',$jenis,$id_usul);
	$pesan = $p[0];
	$link = $p[1];
	//echo $nip;
	if($q){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "UPDATE STATUS BERHASIL";
		simpan_notif($nip,$pesan,$link);
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
}

function ver_dok(){
	session_start();
	$id_dok = $_POST['iddok'];
	$status = $_POST['status'];
	$alasan = $_POST['alasan'];
	
	echo 'BERKAS DENGAN ID USUL "'.$id_usul.'" AKAN DITERIMA.';
	
	$dataupdate = 'id_dok = "'.$id_dok.'", status = "'.$status.'", note = "'.$alasan.'"';
	$kondisi = 'id_dok = "'.$id_dok.'"';
	$q = kueri_update('tb_dokumen',$dataupdate,$kondisi);
	if($q){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "UPDATE STATUS BERHASIL";
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
}

function ver_usul(){
	global $base_url;
	session_start();
	$id_usul = $_POST['id'];
	$status = $_POST['status'];
	$alasan = $_POST['alasan'];
	echo 'BERKAS DENGAN ID USUL "'.$id_usul.'" AKAN DITERIMA.';
	
	$dataupdate = 'status = "'.$status.'", ket = "'.$alasan.'"';
	$kondisi = 'id_usulan = "'.$id_usul.'"';
	$q = kueri_update('tb_usul',$dataupdate,$kondisi);
	$q_ceknip = 'select * from tb_usul where '.$kondisi;
	$cek = kueri($q_ceknip);
	foreach($cek as $c){
		$nip = $c['nip'];
		$jenis = $c['jenis_usulan'];
	}
	$p = data_pesan($status,$jenis,$id_usul);
	$pesan = $p[0];
	$link = $p[1];
	if($q){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "UPDATE STATUS BERHASIL";
		simpan_notif($nip,$pesan,$link);
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$base_url."/admin/verifikasi");
}

function ver_usul_bkn(){
	global $base_url;
	session_start();
	$id_usul = $_POST['id'];
	$nip = $_POST['nip'];
	$status = $_POST['status'];
	if(isset($_POST['alasan'])){
		$alasan = $_POST['alasan'];
	} else {
		$alasan = '';
	}
	if(isset($_POST['tgselesai'])){
		$tg_selesai = $_POST['tgselesai'];
	} else {
		$tg_selesai = '';
	}
	$pengambilan = $_POST['pengambilan'];
	if($status == '8'){
		$ket = $alasan;
	} else
	if($status == '9'){
		$ket = $pengambilan;
	}
	
	echo 'BERKAS DENGAN ID USUL "'.$id_usul.'" AKAN DITERIMA.';
	
	$dataupdate = 'status = "'.$status.'", tgl_selesai = "'.$tg_selesai.'", ket = "'.$ket.'"';
	$kondisi = 'id_usulan = "'.$id_usul.'"';
	//var_dump($dataupdate);
	$q = kueri_update('tb_usul',$dataupdate,$kondisi);
	$q_ceknip = 'select * from tb_usul where '.$kondisi;
	$cek = kueri($q_ceknip);
	foreach($cek as $c){
		$nip = $c['nip'];
		$jenis = $c['jenis_usulan'];
	}
	$p = data_pesan($status,$jenis,$id_usul);
	$pesan = $p[0];
	$link = $p[1];
	
	if($q){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "UPDATE STATUS BERHASIL";
		simpan_notif($nip,$pesan,$link);
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$base_url."/admin/verifikasi");
	
}

function detail_pengambilan(){
	global $base_url;
	session_start();
	$id_usul = $_POST['id'];
	$status = $_POST['status'];
	$nama = $_POST['nama_pengambil'];
	$tanggal = $_POST['tanggal_pengambilan'];
	$pengambilan = 'Telah diambil oleh '.$nama.' pada tanggal '.$tanggal;
	echo 'BERKAS DENGAN ID USUL "'.$id_usul.'" AKAN DITERIMA.';
	
	$dataupdate = 'status = "'.$status.'", ket = "'.$pengambilan.'"';
	$kondisi = 'id_usulan = "'.$id_usul.'"';
	$q = kueri_update('tb_usul',$dataupdate,$kondisi);
	$q_ceknip = 'select * from tb_usul where '.$kondisi;
	$cek = kueri($q_ceknip);
	foreach($cek as $c){
		$nip = $c['nip'];
		$jenis = $c['jenis_usulan'];
	}
	$p = data_pesan($status,$jenis,$id_usul);
	$pesan = $p[0];
	$link = $p[1];
	if($q){
		//echo 'UPDATE FILE BERHASIL';
		$_SESSION['flash_message'] = "UPDATE STATUS BERHASIL";
		simpan_notif($nip,$pesan,$link);
	} else {
		//echo 'GAGAL MENYIMPAN DATABASE';
		$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	header("Location: ".$base_url."/admin/verifikasi");
}

function kirim_berkas(){
	global $base_url;
	$id = $_POST['id'];
	$status = $_POST['status'];
	
	$datacari = array(
		'id_usulan'			=>	$id
		);
	
	$data = 'status =	"'.$status
			.'", tgl_usul = "'.date("Y-m-d").'"';
			;
	$kondisi = ' id_usulan = '.$id;
	$q = kueri_update('tb_usul',$data,$kondisi);
	//var_dump($q);
	
	if($q){
		$cek = kueri_cari('tb_usul',$datacari);
		$dd = mysqli_fetch_assoc($cek);
		$idusul = $dd['id_usulan'];
		if($cek > 0){
			$_SESSION['flash_message'] = "Data Berhasil Disimpan";
			//header("Location: ".$base_url."/user/usul/status/".$idusul);
			//header("Location: ".$_SERVER['HTTP_REFERER']);
			exit();
		}		
	} else {
		$_SESSION['flash_message'] = "Gagal menyimpan data";
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit();
	}
}

function batch_kirim_berkas(){
	global $base_url;
	$aidi = '';
	if(isset($_POST['batch_update'])){

            if(isset($_POST['update'])){
                foreach($_POST['update'] as $updateid){
					//echo 'UPDATE users SET status = "4" WHERE id_usulan = "'.$updateid.'"';
					//echo '<br>';
					$aidi .= $updateid.',';
					$batch = rtrim($aidi, ",");
					//echo '<br>';
					//echo $base_url.'/assets/dlzip.php';
					//echo '<br>';
					$kondisi = 'id_usulan = "'.$updateid.'"';
					$q_ceknip = 'select * from tb_usul where '.$kondisi;
					$cek = kueri($q_ceknip);
					foreach($cek as $c){
						$nip = $c['nip'];
						$jenis = $c['jenis_usulan'];
					}
					$p = data_pesan('6',$jenis,$updateid);
					$pesan = $p[0];
					$link = $p[1];
					$kuer = 'UPDATE tb_usul SET status = "6" WHERE id_usulan = "'.$updateid.'"';
					kueri($kuer);
					simpan_notif($nip,$pesan,$link);
                }
            }
            echo '<form id="testForm" method="post"><input type="hidden" name="x" value="olahzip"><input type="hidden" name="id" value="'.$batch.'"></form>';
			echo '
				<script type="text/javascript">
				var e = document.getElementById("testForm"); e.action="'.$base_url.'/assets/dlzip.php"; e.submit();
				</script>
				';
        }
}

function batch_cetak_surat(){
	global $base_url;
	$aidi = '';
	if(isset($_POST['batch_update'])){
			$nosurat = $_POST['nosurat'];
			$tgsurat = date("Y-m-d");
            if(isset($_POST['update'])){
                foreach($_POST['update'] as $updateid){
					//echo 'UPDATE users SET status = "4" WHERE id_usulan = "'.$updateid.'"';
					//echo '<br>';
					$aidi .= $updateid.',';
					$batch = rtrim($aidi, ",");
					//echo '<br>';
					//echo $base_url.'/assets/dlzip.php';
					//echo '<br>';
					$kondisi = 'id_usulan = "'.$updateid.'"';
					$q_ceknip = 'select * from tb_usul where '.$kondisi;
					$cek = kueri($q_ceknip);
					foreach($cek as $c){
						$nip = $c['nip'];
						$jenis = $c['jenis_usulan'];
					}
					$p = data_pesan('7',$jenis,$updateid);
					$pesan = $p[0];
					$link = $p[1];
					$kuer = 'UPDATE tb_usul SET status = "7", no_surat = "'.$nosurat.'", tgl_surat = "'.$tgsurat.'", tgl_kirim = "'.$tgsurat.'" WHERE id_usulan = "'.$updateid.'"';
					kueri($kuer);
					simpan_notif($nip,$pesan,$link);
                }
            }
			/*
            echo '<form id="testForm" method="post"><input type="hidden" name="x" value="olahzip"><input type="hidden" name="id" value="'.$batch.'"></form>';
			echo '
				<script type="text/javascript">
				var e = document.getElementById("testForm"); e.action="'.$base_url.'/assets/dlzip.php"; e.submit();
				</script>
				';
			*/
			$no_surat = str_replace("/","garing",$nosurat);
			$no_surat = str_replace(" ","spc",$no_surat);
			header("Location: ".$base_url."/admin/cetak_surat_pengantar/".$no_surat);
        }
}

function upload_dok(){
	session_start();
	$id_usul = $_POST['id_usul'];
	$kode_dok = $_POST['kode_dok'];
	//$lokasi_dok = $_POST['alamat'];
	$datasyarat = array(
			'kode_dok'		=>	$kode_dok
			);
	$syrt = kueri_cari('tb_syarat',$datasyarat);
	$dsyrt = mysqli_fetch_assoc($syrt);
	define ('SITE_ROOT', realpath(dirname(__FILE__)));
	$rand = rand();
	$format = $dsyrt['format'];
	$satuan_ukuran = 1024000;
	$batas_ukuran = $satuan_ukuran * $dsyrt['ukuran'];
	$ekstensi =  array($format);
	$filename = $_FILES['dok']['name'];
	$ukuran = $_FILES['dok']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	$data = array(
			'id_usulan'		=>	$id_usul,
			'kode_dok'		=>	$kode_dok,
			'alamat_dok'	=>	'/file_dokumen/'.$id_usul.'_'.$kode_dok.'.'.$dsyrt['format'],
			'status'		=>	'1'
			);
	/*
	var_dump($data);
	echo '<br>';
	var_dump($batas_ukuran);
	*/

	$qc = kueri_cari('tb_dokumen',$data);
	$qcd = mysqli_fetch_assoc($qc);

	if(!in_array($ext,$ekstensi) ) {
		$_SESSION['flash_message'] =  'GAGAL, FORMAT FILE TIDAK DIPERBOLEHKAN';
	}else{
		if($ukuran < $batas_ukuran){		
			$xx = $rand.'_'.$filename;
			move_uploaded_file($_FILES['dok']['tmp_name'], __DIR__ .'/../../assets/file_dokumen/'.$id_usul.'_'.$kode_dok.'.'.$dsyrt['format']);
			
			if($qc->num_rows > 0){
				$dataupdate = 'id_usulan = "'. $id_usul.'", kode_dok = "'. $kode_dok.'", alamat_dok = "/file_dokumen/'.$id_usul.'_'.$kode_dok.'.'.$dsyrt['format'].'", status = "1"';
				$kondisi = 'id_dok = "'.$qcd['id_dok'].'"';
				$q = kueri_update('tb_dokumen',$dataupdate,$kondisi);
				if($q){
					//echo 'UPDATE FILE BERHASIL';
					$_SESSION['flash_message'] = "UPDATE FILE BERHASIL";
					
				} else {
					//echo 'GAGAL MENYIMPAN DATABASE';
					$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
					//header("Location: ".$_SERVER['HTTP_REFERER']);
				}
			} else {
				$q = kueri_insert('tb_dokumen',$data);
				if($q){
					//echo 'UPLOAD BERHASIL';
					$_SESSION['flash_message'] = "UPLOAD FILE BERHASIL";
					//header("Location: ".$_SERVER['HTTP_REFERER']);
				} else {
					$_SESSION['flash_message'] = "GAGAL MENYIMPAN DATABASE";
					//header("Location: ".$_SERVER['HTTP_REFERER']);
				}
			}
		}else{
			$_SESSION['flash_message'] = "GAGAL, UKURAN FILE TERLALU BESAR";
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
	
}

function data_pesan($id,$jk,$idberkas){
	if($jk == '1'){
		$jeniskartu = 'KARIS';
	} else
	if($jk == '2'){
		$jeniskartu = 'KARSU';
	} else
	if($jk == '3'){
		$jeniskartu = 'KARPEG';
	}
	if($id == '2'){
		$pesan = 'Berkas '.$jeniskartu.' anda telah diterima oleh admin untuk verifikasi, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '3'){
		$pesan = 'Berkas '.$jeniskartu.' anda telah disetujui oleh admin, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '4'){
		$pesan = 'Berkas anda perlu perbaikan, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '6'){
		$pesan = 'Berkas '.$jeniskartu.' anda siap dikirim ke BKN, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '7'){
		$pesan = 'Berkas '.$jeniskartu.' anda telah dikirim ke BKN, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '8'){
		$pesan = 'Berkas '.$jeniskartu.' anda dikembalikan oleh BKN [BTL], silahkan cek progres berkas untuk perbaikan';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '9'){
		$pesan = 'Berkas '.$jeniskartu.' anda telah selesai diproses, silahkan cek progres berkas';
		$link = '/user/usul/status/'.$idberkas;
	} else 
	if($id == '10'){
		$pesan = 'Berkas '.$jeniskartu.' anda telah diambil';
		$link = '/user/usul/status/'.$idberkas;
	} else {
		$pesan = '-';
		$link = '#';
	}
	return array($pesan,$link);
}

/*
function kueri($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);
	return $result;
}

//untuk pencarian dalam database
function kueri_cari($table,$data){
	global $conn;
	$out = array();
	$cr = '';
    foreach($data as $key => $value)
        $out[] = "$key='$value'";
    //var_dump($out);
	foreach($out as $o){
		$cr .= $o.' AND ';
	}
	$dcr = rtrim($cr, " AND ");
	//echo $dcr;
	$sql = 'SELECT * FROM '.$table.' where '.$dcr;
	$result = mysqli_query($conn, $sql);
	return $result;
}

//untuk insert ke database
function kueri_insert($table,$data){
	global $conn;
	$keys = array_keys($data);
	$fld = $dd = '';
	foreach($keys as $ky){
		$fld .= $ky.',';
	}
	$field = rtrim($fld, ",");
	foreach($data as $dt){
		$dd .= "'".$dt."',";
	}
	$ddd = rtrim($dd, ",");
	$sql = 'INSERT INTO '.$table.'('.$field.') VALUES('.$ddd.')';
	$result = mysqli_query($conn, $sql);
	return $result;
}

//untuk update database
function kueri_update($table,$data,$kondisi){
	global $conn;
	$keys = array_keys($data);
	foreach($keys as $ky){
		$fld .= $ky.',';
	}
	$field = rtrim($fld, ",");
	foreach($data as $dt){
		$dd .= "'".$dt."',";
	}
	$ddd = rtrim($dd, ",");
	$sql = 'INSERT INTO '.$table.'('.$field.') VALUES('.$ddd.') where '.$kondisi;
	$result = mysqli_query($conn, $sql);
	return $result;
}
*/