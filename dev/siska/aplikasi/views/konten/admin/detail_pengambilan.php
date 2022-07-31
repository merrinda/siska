<?php
$dt_usul = mysqli_fetch_assoc($data_usul);
$jenis_kartu = $dt_usul['jenis_usulan'];
$id_usul = $dt_usul['id_usulan'];
$l = $base_url.'/user/usul/status/'.$id_usul;

$syrt = syarat($jenis_kartu);
$doks = dokumen($id_usul);
foreach($doks as $d){
	//var_dump($d);
}

if($dt_usul['hilang'] == '1'){
	$hlg = '<h4 align="center">Usul Kehilangan</h4>';
} else {
	$hlg = '';
}

if($dt_usul['statuskawin'] == '1'){
	$stk = '<option value="1">Perkawinan Pertama</option>';
} else {
	$stk = '<option value="2">Perkawinan Kedua atau selanjutnya</option>';
}
$tgtgskpn = $tgtgpmlk = '';
if($jenis_kartu == '1'){
	$kartu = 'KARIS';
	$o = '<option value="1">Karis</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	//$tmtcp = $nokarpeg = $nosk = $tgskpn = $pmlk = $tgpmlk = 'required';
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$tgtgpmlk = '';
	$pmlk = $tgpmlk = 'readonly';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly>
			'.$stk.'
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '2'){
	$kartu = 'KARSU';
	$o = '<option value="2">Karsu</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$nosk = $tgskpn = 'readonly style="background:black;"';
	$pmlk = $tgpmlk = 'readonly';
	$jandaduda = '
	<div class="row mb-3">
    <label for="inputJenis" class="col-sm-2 col-form-label">Status Perkawinan</label>
    <div class="col-sm-10">
		<select class="form-control" aria-label="statuskawin" name="statuskawin" readonly>
			'.$stk.'
		</select>
    </div>
	</div>
	';
} else
if($jenis_kartu == '3'){
	$kartu = 'KARPEG';
	$o = '<option value="3">Karpeg</option>';
	$l = $base_url.'/user/usul/dok/'.$jenis_kartu;
	$tmtcp = $nokarpeg = $nosk = $tgskpn = '';
	$pmlk = $tgpmlk = 'readonly style="background:black;"';
	$jandaduda = '
	<div class="row mb-3" style="display:none;">
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
<h4 align="center">Review usulan <?= $kartu ?> untuk NIP. <?= $dt_usul['nip'] ?></h4>
<?= $hlg ?>
<br><br>
<form>
  <div class="row mb-3">
    <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
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
		<select class="form-control" aria-label="Jenis Usulan" name="jenkel" readonly>
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
      <input type="text" class="form-control" id="tmtcp" name="tmtcp" value="<?= $dt_usul['tmt_cpns'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="noskpn" value="<?= $dt_usul['no_sk_pns'] ?>" <?= $nosk ?> readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal SK PNS</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTglNkh" name="tgskpn" value="<?= $dt_usul['tgl_sk_pns'] ?>" <?= $tgskpn ?> readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">No. KARPEG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="karpeg" value="<?= $dt_usul['karpeg'] ?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputUnker" class="col-sm-2 col-form-label">Nama Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUnker" name="namapemilik" value="<?= $dt_usul['nama_pemilik'] ?>" <?= $pmlk ?> readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputTglNkh" class="col-sm-2 col-form-label">Tanggal Lahir Pemilik</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTglNkh" name="tglpemilik" value="<?= $dt_usul['tgl_lhr_pemilik'] ?>" <?= $tgpmlk ?> readonly>
    </div>
  </div>
  <?= $jandaduda ?>
  <div class="row mb-3">
    <label for="inputPasangan" class="col-sm-2 col-form-label">No. HP Aktif</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPasangan" name="nohp" value="<?= $dt_usul['no_hp'] ?>" readonly>
    </div>
  </div>
  <br><br>
</form>
<form id="update_status" action="<?= $a; ?>" method="post">
<input type="hidden" name="id" value="<?= $id_usul ?>">
<input type="hidden" name="status" value="10">
<table width="100%">
	<tr>
		<td width="60%"></td>
		<td width="40%">
			<input type="text" class="form-control" name="nama_pengambil" placeholder="Nama Pengambil" required>
		</td>
	</tr>
	<tr>
		<td width="60%"></td>
		<td width="40%">
			<input type="text" class="form-control datepicker" name="tanggal_pengambilan" placeholder="Tanggal diambil" required>
		</td>
	</tr>
</table>
</form>

<p align="right">
<input id="tbsetujui" form="update_status" type="submit" class="btn btn-primary" value="Kartu telah diambil">
</p>
</div>
</div>
<br><br>

