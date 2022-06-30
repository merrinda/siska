<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$l = $base_url.'/user/usul/review/'.$id_usul;
function status($st){
	global $dt_usul;
	if ($dt_usul['statuskawin'] == $st) { return ' selected="selected"'; } else { return '';}
}
if($hilang == '1'){
	$hlg = '<input type="text" class="form-control" id="inputNama" name="hilang" value="'.$hilang.'" readonly>';
} else {
	$hlg = '<input type="text" class="form-control" id="inputNama" name="hilang" value="'.$dt_usul['hilang'].'" readonly>';
}
$tgtgskpn = $tgtgpmlk = '';
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	//$tmtcp = $nokarpeg = $nosk = $tgskpn = $pmlk = $tgpmlk = 'required';
	$tmtcp = $nokarpeg  = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = 'datepicker';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" required>
			<option value="" '.status('').'>Pilih Status Perkawinan</option>
			<option value="1" '.status('1').'>Perkawinan Pertama</option>
			<option value="2" '.status('2').'>Perkawinan Kedua atau selanjutnya</option>
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg  = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = 'datepicker';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" required>
			<option value="">Pilih Status Perkawinan</option>
			<option value="1">Perkawinan Pertama</option>
			<option value="2">Perkawinan Kedua atau selanjutnya</option>
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg = $nosk = $tgskpn = 'required';
	$pmlk = $tgpmlk = 'readonly style="background:black;"';
	$tgtgskpn = 'datepicker';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label" style="background:black;color:black;"></label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly style="background:black;">
			<option value=""></option>
		</select>
    </div>
	</div>
	';
}

$kel = $dt_usul['jk'];
if($kel == '1'){
	$jk = '<option value="1">Laki-Laki</option>';
} else {
	$jk = '<option value="2">Perempuan</option>';
}

?>
<div align="center">
<div class="col-10" align="left">
<h4 align="center">Lengkapi detail usulan <?= $kartu ?>!</h4>
<br><br>
<form action="<?= $a; ?>" method="post">
  <div class="row mb-3">
    <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
		<input type="hidden" class="form-control" id="id" name="id" value="<?= $dt_usul['id_usulan'] ?>" readonly>
      <input type="text" class="form-control" id="inputNIP" name="nip" value="<?= $dt_usul['nip'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $dt_usul['nama'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNama" name="tglhr" value="<?= $dt_usul['tgl_lhr'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenkel" required>
			<?= $jk; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Usul</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="Jenis Usulan" name="jenis" required>
			<?= $o; ?>
		</select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">TMT CPNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" id="tmtcp" name="tmtcp" <?= $tmtcp ?> value="<?= $dt_usul['tmt_cpns'] ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="noskpn" value="<?= $dt_usul['no_sk_pns'] ?>" <?= $nosk ?>>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= $tgtgskpn ?>" id="tgskpn" name="tgskpn" value="<?= $dt_usul['tgl_sk_pns'] ?>" <?= $tgskpn ?>>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="karpeg" value="<?= $dt_usul['karpeg'] ?>" <?= $nokarpeg ?>>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="namapemilik" value="<?= $dt_usul['nama_pemilik'] ?>" <?= $pmlk ?>>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= $tgtgpmlk ?>" id="inputTglNkh" name="tglpemilik" value="<?= $dt_usul['tgl_lhr_pemilik'] ?>" <?= $tgpmlk ?>>
    </div>
  </div>
  <?= $jandaduda ?>
  <div class="row mb-3">
    <label for="inputPasangan" class="col-sm-2 col-form-label">No. HP Aktif</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPasangan" name="nohp" value="<?= $dt_usul['no_hp'] ?>" required>
    </div>
  </div>
  <?= $hlg ?>
  <div align="right">
	<button type="submit" class="btn btn-primary">Selanjutnya</button>
  </div>
  <br><br>
</form>
<button class="btn btn-danger" onclick="location.href='<?= $l ?>';">Selanjutnya</button>
</div>
</div>

