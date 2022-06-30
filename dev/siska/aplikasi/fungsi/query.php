<?php

function kueri($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);
	return $result;
}

//cari usulan
function usulan($id){
	$data = array(
		'id_usulan'	=>	$id
	);
	$result = kueri_cari('tb_usul',$data);
	return $result;
}

function cekberkasusulan($st){
	//$jns = $jenis;
	$statlist = $st;
	$status = implode(',', $statlist);
	$data = array(
		'status' => '1'
	);
	$kuer = "SELECT * FROM tb_usul WHERE status in ('$status')";
	$ada = kueri($kuer);
	return $ada;
}

//cek list syarat
function syarat($id = null,$khusus = null){
	if($khusus != null){
		$data = array(
			'jenis_usul'	=>	$id,
			'khusus'		=> $khusus
		);
	} else {
		$data = array(
			'jenis_usul'	=>	$id
		);
	}
	
	$result = cari_like('tb_syarat',$data);
	return $result;
}

//cek list dokumen
function dokumen($id){
	$data = array(
		'id_usulan'	=>	$id
	);
	$result = kueri_cari('tb_dokumen',$data);
	return $result;
}

//cek dokumen
function cek_nama_dokumen($id){
	$data = array(
		'kode_dok'	=>	$id
	);
	$result = kueri_cari('tb_syarat',$data);
	foreach($result as $r){
		$ndok = $r['nama_dok'];
	}
	return $ndok;
}

//cek list syarat
function cek_syarat($id,$dok){
	$data = array(
		'id_usulan'	=>	$id,
		'kode_dok'	=> $dok
	);
	$result = kueri_cari('tb_dokumen',$data);
	return $result;
}

//untuk pencarian dalam database
function cari_like($table,$data){
	global $conn;
	$out = array();
	$cr = '';
    foreach($data as $key => $value)
        $out[] = "$key like '%$value%'";
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
	$sql = 'UPDATE '.$table.' SET '.$data.' where '.$kondisi;
	$result = mysqli_query($conn, $sql);
	return $result;
}

function kueri_tes($a){
	return $a;
}